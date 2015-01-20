<?php

try{




/////??????????


function MakePrettyException(Exception $e) {
    $trace = $e->getTrace();

    $result = 'Exception: "';
    $result .= $e->getMessage();
    $result .= '" @ ';
    if($trace[0]['class'] != '') {
      $result .= $trace[0]['class'];
      $result .= '->';
    }
    $result .= $trace[0]['function'];
    $result .= $trace[0]['file'];
    $result .= $trace[0]['line'];

    $result .= '();<br />';

    return $result;
  }
  
  
  
function get_exams (){

echo "reached 1";

$five_days_back_date = date("Y-m-d H:i:s", strtotime("-7 days"));

$current_date = date ("Y-m-d H:i:s");

$query = "SELECT id, name, batch_id FROM exam_groups WHERE". " is_published <> '5'" ."AND exam_date BETWEEN '" . "$five_days_back_date" . "' AND '" ."$current_date" . "'" ;

$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}


/*
$row = mysql_fetch_row($sql_result);

$exam_id = $row[0];
$exam_name = $row[1];

echo "$exam_id ,, $exam_name";

*/

while($db_field = mysql_fetch_assoc($sql_result))
     {

      $exam_id = $db_field['id'];  
      $exam_name = $db_field['name'];
      $batch_id = $db_field['batch_id'];
      
      echo "<br>$exam_id,,,,$exam_name,,,,$batch_id";
      
      notify_result ($exam_id, $exam_name, $batch_id);

     }//while end


   $query = "UPDATE user_records SET result_notified = '0'";
$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
     
     
     echo "exited 1";

     
return null;

}//func end


function notify_result ($exam_id, $exam_name, $batch_id){

echo "reached 2";


$query = "SELECT courses.code, batches.start_date from courses INNER JOIN batches ON courses.id = batches.course_id  WHERE batches.id ='" . "$batch_id" . "'";

$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}



$row = mysql_fetch_row($sql_result);

$department = $row[0];
$batch = substr( $row[1], 2, 2);
$count = 0;

echo "11!$#@%!$department@#$@!$batch#$@";




$query = "SELECT student_id from exam_scores INNER JOIN exams ON exams.id = exam_scores.exam_id  WHERE exam_scores.remarks <> 50 AND exams.exam_group_id = '" . "$exam_id'";

$sql_result_out = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}



     while($db_field_out = mysql_fetch_assoc($sql_result_out)) //outer while
     {
     
     $count++; //checking if null
     
     $student_id = $db_field_out['student_id'];
     $roll_no = get_roll_no ($student_id);

echo "22!$#@%!$student_id@#$@!$roll_no#$@";

$query = "SELECT fb_id, should_notify_result FROM user_records WHERE  department LIKE '$department' AND batch LIKE '" . "$batch" . "'" . " AND roll_no = '" . "$roll_no'" . " AND result_notified = '0'";
echo "<br>$query";

$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

    
while($db_field = mysql_fetch_assoc($sql_result))
     {
$fb_id = $db_field['fb_id'];
$should_notify_result = $db_field['should_notify_result'];



if ($should_notify_result == 1){

$message = urlencode ("Result of $exam_name exam is out. Check it here!");

$redirect_url= urlencode ("http://apps.facebook.com/infobot/studentresults.php") ;


$url = "https://graph.facebook.com/$fb_id/notifications?access_token=304045013036764|bd07dae8399b5dd49969b7cae0654e52&template=$message&href=index.php?bounceback_url=$redirect_url";
 
    echo "$url";
          
    $data = array('key1' => 'value1', 'key2' => 'value2');

    // use key 'http' even if you send the request to https://...
    $options = array('http' => array('method'  => 'POST','content' => http_build_query($data)));
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    var_dump ($result);
    
  echo "exited 2";
  
  }//should_notify if end
  
  else {
  $result ="true";
  }
  
  
  
    
    $found = strpos ( $result, "true" );
    
    if ($found !== false){
    
    $query = "UPDATE user_records SET result_notified = '1' WHERE fb_id = '" . "$fb_id" . "'";
    
    echo "<br>lala $query";
$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

    
    update_is_notified_remarks ($exam_id, $exam_name, $batch_id, $student_id);
    
    }

  echo "exited 2 2nd";

}//while end




}//outer while end


if($count == 0)
update_is_published ($exam_name, $batch_id);

  echo "exited 2 finally";

}//func end



function get_roll_no ($student_id){
  echo "reached 3";


$query = "SELECT admission_no FROM students WHERE id = '" . "$student_id'";
$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}


$row = mysql_fetch_row($sql_result);

$roll_no = $row[0];
$roll_no = substr( $roll_no, 0, 3);


echo "exited 3";
return $roll_no;

  


}// func end





function update_is_notified_remarks ($exam_id, $exam_name, $batch_id, $student_id){
  echo "reached 4 $student_id $exam_id";


$query = "UPDATE exam_scores INNER JOIN exams ON exams.id = exam_scores.exam_id SET remarks = '50' WHERE student_id = '$student_id' AND exams.exam_group_id = '$exam_id'";
$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}




  echo "exited 4";

}//func end






function update_is_published ($exam_name, $batch_id){
  echo "reached 5";

$query = "UPDATE exam_groups SET is_published = '5' WHERE name = '$exam_name' AND batch_id = '$batch_id'";
$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}



  echo "exited 5";

}//func end






////////////////








require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}

get_exams ();






}

catch(Exception $e)
{
    $trace = MakePrettyException($e);
    $current_url = $_SERVER['REQUEST_URI'];
    $message = urlencode ("IN - $current_url, " . $trace);    
    ?>
    
    <script>
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/broken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}



?>