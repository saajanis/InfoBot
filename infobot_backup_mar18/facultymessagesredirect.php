<?php



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

$no_permission_redirect = "http://apps.facebook.com/infobot/facultyindex.php?bounceback_url=http://apps.facebook.com/infobot/facultymessages.php";
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

$notification = "%40%5B$user%5D%20has%20sent%20a%20new%20message!";





$constructed_query = "SELECT * FROM user_records" ; 

if ($department !== '%' && $batch !== '%'){
$constructed_query = $constructed_query . " WHERE department = '$department' AND batch = '$batch'";
}

if ($department !== '%' && $batch == '%'){
$constructed_query = $constructed_query . " WHERE department = '$department'";
}

if ($department == '%' && $batch !== '%'){
$constructed_query = $constructed_query . " WHERE batch = '$batch'";
}


// echo "<br>$constructed_query";

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
    
  //  echo "<br>new$url";
    
    $data = array('key1' => 'value1', 'key2' => 'value2');

    // use key 'http' even if you send the request to https://...
    $options = array('http' => array('method'  => 'POST','content' => http_build_query($data)));
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

  //  var_dump ($result);
    
    $found = strpos ( $result, "true" );
    
   //  echo "<br>!@#$$$posted";
    
    }//if end
    
    
    }//while end



}//func end



/////////////////




require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
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


// echo "/////$batch ?$department $semester $message";


if ($user ){



		$args = array(
			'access_token'  => $page_info['access_token'],
			'message'       => "$message",
			//link
			'method'       => 'post'
		);


if($post_id = $facebook->api("/miet.jammu/feed","post",$args)){
			// echo "Status: OK: posted to tgmcmiet2010<br>FB API response: <br>"; 
			
            $response = $post_id['id'];
            
            
            
            
            $post_url = url_constructor ($response);
            
            if ($post_url == null){
            echo "<br> Error! The content was not posted on the page wall...";
            
            }
            
            else {
            
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




?>


<?php 
//////////////end

} // additional try end

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