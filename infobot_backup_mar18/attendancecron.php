<?php

set_time_limit($seconds);
set_time_limit(0);


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



function start(){


$query = "SELECT * FROM user_records where attendance_notified = '0'";
$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

while($db_field = mysql_fetch_assoc($sql_result))
     {
     
       $roll_no = $db_field['roll_no'];  
       $batch = $db_field['batch']; 

       $fb_id = $db_field['fb_id'];
       
       $GLOBALS['count'] = 0;

       get_student ($roll_no, $batch, $fb_id);
     
     
     }// while end





}//func end


function updateNotified ($tableName, $roll_no, $batch)
    
    {
    
    
    $query = "UPDATE user_records SET attendance_notified = '1' WHERE roll_no = '$roll_no' AND batch = '". "$batch" ."'";
    
    echo "<br> 747 $query";
    
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    return null;
    
    }



function calculate_percentage ($student_id, $subject_id, $subject_name){

$year = date("Y");
$year_back = $year;

$month = date("m");
$date = date("d");
$sem_months_back = 0;

if ($month>=2 && $month<=7) 
{ $sem_months_back = 2; }

else
{ $sem_months_back = 8; }


if ($month==1 )
{ $year_back = $year-1; }


//absents

$query = "SELECT subjects.code, subjects.name, period_entries.month_date, period_entries.subject_id, attendances.period_table_entry_id FROM period_entries INNER JOIN attendances INNER JOIN subjects ON period_entries.id = attendances.period_table_entry_id AND subjects.id = period_entries.subject_id where student_id = '" . "$student_id".  "' AND period_entries.subject_id = '" . "$subject_id" . "' AND period_entries.month_date BETWEEN '" . "$year_back" . "-" . "$sem_months_back" . "-1' AND '" . "$year" . "-" . "$month" . "-$date'";  //month thing divided into three

// echo "<br><br>dadaa $query";

 //month thing divided into three
    
    
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $lectures_absent = mysql_num_rows ( $sql_result ); //absent_count
    
//lab exists
$query = "SELECT code FROM subjects WHERE id = '" . "$subject_id" . "'";
    
    
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $subject = $row[0];
    
// total


$query = "SELECT * FROM period_entries WHERE subject_id = '" . "$subject_id" . "' AND" . " month_date BETWEEN '" . "$year_back" . "-" . "$sem_months_back" . "-1' AND '" . "$year" . "-" . "$month" . "-$date' ";

// echo "<br><br>2 $query";

    
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $lectures_total = mysql_num_rows ( $sql_result ); //total_count
    
    //half total if lab


    
    $found = strpos ( $subject_name, "/" );
    
    if ($found != false){
    
    if (1) { //extra lectures fix
    $lectures_total = $lectures_total/2;
    }
    
    }
    
    $lectures_total = round ($lectures_total);
    
    if ($lectures_absent === 0 || $lectures_total === 0){
        
            return ("100");
            
            }
    else{       
                
    $lectures_percentage = (($lectures_total-$lectures_absent)/($lectures_total))*100;


    
    return ($lectures_percentage);
    }

}//func end



function get_student ($roll_no, $batch, $fb_id){


$query = "SELECT should_notify_attendance FROM user_records WHERE $fb_id = '" . "$fb_id" . "' AND roll_no = '" . "$roll_no" . "' AND batch = '" . "$batch" . "'";

$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $row = mysql_fetch_row($sql_result);


if ($row['0'] == 0)
{ return NULL; } //break part




$query = "SELECT id, batch_id FROM students WHERE admission_no LIKE '" . "$roll_no" . "%'" . " AND admission_no LIKE '" . "%$batch'";

$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

$row = mysql_fetch_row($sql_result);

   
$student_id = $row[0];
$batch_id = $row[1];


 get_subjects ($roll_no, $batch, $student_id, $batch_id, $fb_id);
 
 echo "<br>--$notified!--find shortage--get_student";
 
 
 
 if ($GLOBALS['notified'] == 1){
 updateNotified ("user_records", $roll_no, $batch);
 
 
 }// if end
 return null;
 
 }//func end




function get_subjects ($roll_no, $batch, $student_id, $batch_id, $fb_id){

$six_months_back_date = date("Y-m-d H:i:s", strtotime("-6 months"));
$current_date = date ("Y-m-d H:i:s");

$year = date("Y");


$month = date("m");
$date = date("d");
$year_back = $year-1;
$year_back_back = $year-2;
$year_after = $year+1;

$sem_months_back = 0;

if ($month>=2 && $month<=8) 
{ $sem_months_back = 2; }

else
{ $sem_months_back = 8; }


$jumper_2012 = 2012;
$jumper_year = $year;
$jumper_year_back = $year_back;
$jumper_year_after = $year_after;
$jumper_year_back_back = $year_back_back;

if ($month>=1 && $month<=2)
{ 
$jumper_2012++; //can jump to 2013
$jumper_year++;
$jumper_year_back++;
$jumper_year_after++;
$jumper_year_back_back++;


}




$query = "SELECT id, name FROM `subjects` WHERE batch_id = '" . "$batch_id" . "'" . " AND is_deleted = '0'";




    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

    $row = 1;
    while($row != null){
  
    $row = mysql_fetch_row($sql_result);
    
    $subject_id = $row[0] ;
    $subject_name = $row[1] ;

    
    find_shortage ($roll_no, $batch, $student_id, $subject_id, $subject_name, $fb_id);
    
    }//while end
    
    
    if ($GLOBALS['count'] !== 0 ){
    notify_attendance ($roll_no, $batch, $GLOBALS['count'], $fb_id);
    }
    
    
    echo "<br>--$notified!--get_subjects";

$GLOBALS['count'] = 0 ;

    return NULL;

}//func end



function find_shortage ($roll_no, $batch, $student_id, $subject_id, $subject_name, $fb_id){

$subject_percentage = calculate_percentage ($student_id, $subject_id, $subject_name);

echo "<br>$roll_no -- $batch -- $subject_name -- $subject_percentage";

if ($subject_percentage < 75 ){

//if ($subject_percentage){



$GLOBALS['count']++;





}//if end




echo "<br>--$notified!--find shortage";

return NULL;

}//func end


function notify_attendance ($roll_no, $batch, $count, $fb_id){

// $count = $count-1; short in n-1 subjects problem, may or may not arise



$message = urlencode ("Your attendance is currently short in \"" . "$count" . "\" subjects. Contact your HOD!");

echo "<br>!!$fb_id";


$redirect_url= urlencode ("http://apps.facebook.com/infobot/studentviewattendance.php") ;

$url = "https://graph.facebook.com/$fb_id/notifications?access_token=304045013036764|bd07dae8399b5dd49969b7cae0654e52&template=$message&href=index.php?bounceback_url=$redirect_url";
    
    $data = array('key1' => 'value1', 'key2' => 'value2');

    // use key 'http' even if you send the request to https://...
    $options = array('http' => array('method'  => 'POST','content' => http_build_query($data)));
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    var_dump ($result);
    
    $found = strpos ( $result, "true" );
    
    echo "<br>!@#$$$found";
    
    if ($found !== false){
    
  
    $GLOBALS['notified'] = 1;


    }//if end
     

echo "<br>--$notified!--notify_attendance";

return NULL;

}//func end






require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}

$roll_no = $_POST['roll_no']? : 'x';
$batch = $_POST['batch']? : 'x';
$batch = substr($batch, -2);

$notified = 0;
$count = 0;

start ();








?>