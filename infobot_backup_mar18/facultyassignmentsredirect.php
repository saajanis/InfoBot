<?php

ini_set('memory_limit', '-1');

set_time_limit(999);
ini_set('max_execution_time', 999);


require_once("error_display.php");

try {
// parse_str($_SERVER['QUERY_STRING'], $_REQUEST);  //reproduces userID 0, adding / end in next at params could be a solution



require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
));

$perms = $facebook->api(array(
    "method" => "fql.query",
    "query" => "SELECT manage_notifications,publish_stream FROM permissions WHERE uid=me()"
        ));
        
        
$user = $facebook->getUser();

$params = array( 'next' => 'http://apps.facebook.com/infobot/index.php?bounceback_url=http://apps.facebook.com/infobot/welcome.php' );

$logout = $facebook->getLogoutUrl($params);
       
if ($perms[0]['manage_notifications']==='0' || $perms[0]['publish_stream']==='0' || empty ($perms) ){

$no_permission_redirect = "http://apps.facebook.com/infobot/facultyindex.php?bounceback_url=http://apps.facebook.com/infobot/facultyknowledge.php";
?>
<script>
        
        top.location.href="<?php echo $no_permission_redirect; ?>";  
</script>
<?php


}

?>




<?php


$user = $_POST['user'];




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
  


if(1){


?>


<?


try{







function safeClean($n)
{

    $n = trim($n);

    if(get_magic_quotes_gpc())
    {
        $n = stripslashes($n);
    } 

    $n = mysql_escape_string($n);
    $n = htmlentities($n);
    

    return $n;
}





function url_constructor ($response){

$iteration = 1;


$post_url = null ;


$response_broken = strtok($response, "_");


while ($response_broken !== false) {
            
            
            if ($iteration == 1){

            if($response_broken !=null)
            $post_url = "https://www.facebook.com/permalink.php?id=" . "$response_broken" . "&v=wall&story_fbid=";
            
            
            }
        
            if ($iteration == 2){
            
            if($response_broken !=null)
            $post_url = "$post_url" . "$response_broken";
            
            break;
            }

$iteration++;

$response_broken = strtok(" _");

}//while end




return $post_url;


}//func end




function send_message ($user, $post_url, $batch, $department, $semester, $roll_no, $message){

$notification = "You%20have%20a%20new%20course%20assignment%20by%20%40%5B$user%5D.%20Check%20it%20here!";




$constructed_query = "SELECT * FROM user_records WHERE student = '1' AND should_notify_knowledge = '1'" ;

if ($department !== '%' && $batch !== '%'){
$constructed_query = $constructed_query . " AND department = '$department' AND batch = '$batch'";
}

if ($department !== '%' && $batch == '%'){
$constructed_query = $constructed_query . " AND department = '$department'";
}

if ($department == '%' && $batch !== '%'){
$constructed_query = $constructed_query . " AND batch = '$batch'";
}


//echo "<br>$constructed_query";

if ($roll_no == null){

$query = "$constructed_query";
    $sql_result_xls = mysql_query($query);
    if(!$sql_result_xls) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
}

else {

$query = "SELECT * FROM user_records WHERE roll_no = '$roll_no'";
    $sql_result_xls = mysql_query($query);
    if(!$sql_result_xls) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
}    
    
    $row_result = 1;
    
    
    while($row_result != null){
    
    $row_result = mysql_fetch_row($sql_result_xls);
    
    $fb_id = $row_result[5];
    
    $redirect = "$post_url";
    
    $redirect_encoded = str_replace("&", "[MyAmp]", $redirect);
    
    
    
    if($fb_id != null) {
    
    $url = "https://graph.facebook.com/$fb_id/notifications?access_token=304045013036764|bd07dae8399b5dd49969b7cae0654e52&template=$notification&href=message_redirect.php?bounce_back=$redirect_encoded" ;
    
   // echo "<br>new$url";
    
    $data = array('key1' => 'value1', 'key2' => 'value2');

    // use key 'http' even if you send the request to https://...
    $options = array('http' => array('method'  => 'POST','content' => http_build_query($data)));
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // var_dump ($result);
    
    $found = strpos ( $result, "true" );
    
   // echo "<br>!@#$$$posted";
    
    }//if end
    
    
    }//while end



}//func end



/////////////////




require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
  'fileUpload' => true,
  'cookie' => true, 
));










if (1) { /*So now we will have a valid user id with a valid oauth access token and so the code will work fine.*/



require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}




$query = "SELECT * FROM user_records WHERE fb_id=$user AND faculty = 1"  ;

 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}


$row = mysql_fetch_row($sql_result);


if ($row == null){

echo "<br>You are not authorised to view this page!";
exit();
}



$batch = substr ($_POST['batch'] , -2 );
$department = $_POST['department'];
$semester = $_POST['semester'];
$roll_no = $_POST['roll_no'];
$message = $_POST['message'];

$file_actual_name = $_FILES['file']['name']; 
$filename = $_FILES['file']['tmp_name']; 
$filetype = $_FILES['file']['type']; 

$file_url = "http://exploremiet.com/infobot/uploads/" . "$file_actual_name" ;



$target_Path = "uploads/";
$target_Path = $target_Path.basename( $_FILES['file']['name'] );


move_uploaded_file( $_FILES['file']['tmp_name'], $target_Path );


// echo "/////$batch ?$department $semester $message";


if ($user ){


$args = array('access_token'  => $page_info['access_token'],
    		'message'       => "$message",
            'caption' => "Your Assignment!", 
            'name' => "$file_actual_name",
            'description' => "You can right click on the above file and choose 'save link as' to save this assignment on your computer.   PS-This link will stop working in the next semester!",
            'picture' => "http://exploremiet.com/infobot/assignment.jpg",
            
            'link' => "$file_url",
        );
/*
$args = array(
    		'access_token'  => $page_info['access_token'],
			'message'       => "$message",
            'source'=> '@' . urlencode(realpath("uploads/dbsync.php")), 
            //'image'   => '@' . realpath("uploads/lala.jpg"),
            //realpath("downloads") . '/own.jpg',
			//'link' => 'http://mietexplore.com/infobot/assignment',
            'media' => array(array(
                    'type' => "php", 
                    'src' => $url, 
                    'href' => 'http://mietexplore.com/infobot/uploads/dbsync.php')),
              
             
              'attachment' => json_encode(array(
    "media" =>
    array(
        'type' => 'mp3',
        "src" => urlencode("http://www.looptvandfilm.com/blog/Radiohead%20-%20In%20Rainbows/01%20-%20Radiohead%20-%2015%20Step.MP3"), 
        "title" => "15 Step", 
        "artist" => "Radiohead", 
        "album" => "In Rainbows"
    )
)),
           
           
           
			'method'       => 'post'
		);

*/

    	

if($post_id = $facebook->api("/miet.jammu/feed","post",$args)){
						
            $response = $post_id['id'];
            
            
            
            
            $post_url = url_constructor ($response);
            
            if ($post_url == null){
            echo "<br> Error! The content was not posted on the page wall...";
            
            }
            
            else {
            
            
            
            
            
            $query = "SELECT first_name, last_name FROM user_records WHERE fb_id = '" . "$user" . "' AND faculty = '1'";
 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
            $db_field = mysql_fetch_assoc($sql_result);
            
            $first_name = $db_field['first_name'];
            $last_name = $db_field['last_name'];
            $full_name = "$first_name" . " " . "$last_name";
            $time = date ("Y-m-d H:i:s"); 
            
            $query = "INSERT INTO faculty_assignments (faculty, faculty_fb_id, batch, department, post_link, time) VALUES ('$full_name' , '$user', '$batch', '$department', '$post_url', '$time' )";
 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
            
            
            send_message ($user, $post_url, $batch, $department, $semester, $roll_no, $message);

?>
            
             <script>
        
        top.location.href="<?php echo "$post_url"; ?>";  
    </script>
            
            
<?php            
            }
            
            
            
			//echo '<br><a href="http://apps.facebook.com/infobot/facultyhome.php" target="_top">New post</a>';
		} else {
			echo "Status: Error: could not post to FB page";
		}
        
        
  }   








} else {/*If user id isn't present just redirect it to login url*/

//index.php


try{

$bounceback_url = $_GET['bounceback_url'];

if ($bounceback_url != null)
{
$redirect_url = $bounceback_url;
}
else
{
$redirect_url = 'http://apps.facebook.com/infobot/index.php'; //main page
}


// Enter the app id and secret below
define('YOUR_APP_ID', '304045013036764');
define('YOUR_APP_SECRET', 'bd07dae8399b5dd49969b7cae0654e52');

require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
));




?>

<html>
  <body>
    <div id="fb-root"></div>
    <?php if ($user) { 
       ?>
      Welcome 
      
      <?php
      $params = array('redirect_uri' => "$redirect_url",'scope'=>'publish_stream, manage_notifications');


$loginURL = $facebook->getLoginUrl($params);
      ?>

<script>
    top.location.href="<?php echo $loginURL; ?>";
</script>
            
    <?php } else { ?>
    
    <fb:login-button  width = "" scope="publish_stream, manage_notifications" size="large"
                 on-login="top.location = "<?php echo $redirect_url; ?>"; ">
  Login with Facebook
</fb:login-button>

    <?php } ?>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId : '304045013036764',
          channelUrl : 'http://infobot.x10.mx/channel.html',
          status: true, 
          cookie: true,
          xfbml : true,
          oauth : true,
        });

        FB.Event.subscribe('auth.login', function(response) {
          top.location=window.location= "<?php echo $redirect_url; ?>";
        });
      };

      (function(d){
        var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        d.getElementsByTagName('head')[0].appendChild(js);
      }(document));
      
    
    </script>
  </body>
</html>


<?php }//try end 

catch(Exception $e)
{
    $trace = MakePrettyException($e);
    $current_url = $_SERVER['REQUEST_URI'];
    $message = urlencode ("IN - $current_url, " . $trace);    
    ?>
    
    <script>
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/facultybroken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}


//index.php
}//else end



}//try end


catch(Exception $e)
{
    $trace = MakePrettyException($e);
    $current_url = $_SERVER['REQUEST_URI'];
    $message = urlencode ("IN - $current_url, " . $trace);    
    ?>
    
    <script>
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/facultybroken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}


?>

</div>

<?php

} //isset if end







} // top try end

catch(Exception $e)
{
    $trace = MakePrettyException($e);
    $current_url = $_SERVER['REQUEST_URI'];
    $message = urlencode ("IN - $current_url, " . $trace);    
    ?>
    
    <script>
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/facultybroken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}




?>