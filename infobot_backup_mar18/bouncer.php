<?php





require_once("error_display.php");

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


try{

require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
));

$user = $facebook->getUser();






if ($user <> '0' && $user <> '') { /*if valid user id i.e. neither 0 nor blank nor null*/
try {
// Proceed knowing you have a logged in user who's authenticated.
$user = $facebook->getUser();
} catch (FacebookApiException $e) { /*sometimes it shows user id even if user in not logged in and it results in Oauth exception. In this case we will set it back to 0.*/
error_log($e);

print_r ($e);

$user = 0;
}
}



if ($user <> '0' && $user <> '') { /*So now we will have a valid user id with a valid oauth access token and so the code will work fine.*/





require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}




$redirect_url = 'http://apps.facebook.com/infobot/welcome.php';//default


$query = "SELECT * FROM user_records WHERE fb_id=$user AND student = 1"  ;

 $sql_result_student = mysql_query($query);
    if(!$sql_result_student) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}


$db_field_student = mysql_fetch_assoc($sql_result_student);


$var1 = $db_field_student['student'];



$name = $db_field_student['first_name'] . " " . $db_field_student['last_name'];
$details = $db_field_student['roll_no'] . "-" . $db_field_student['department'] . "-" . $db_field_student['batch'];




if ($db_field_student['student'] == 1){

$redirect_url = "http://apps.facebook.com/infobot/studenthome.php";





////

$query = "INSERT INTO visitors (name, details, fb_id) VALUES ('$name', '$details', '$user')"  ;


 
$sql_result= mysql_query($query);
   

////

}

else{
$query = "SELECT * FROM user_records WHERE fb_id=$user AND faculty = 1"  ;
 $sql_result_faculty = mysql_query($query);
    if(!$sql_result_faculty) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}


$db_field_faculty = mysql_fetch_assoc($sql_result_faculty);


$var2 = $db_field_faculty['faculty'];


$name = $db_field_faculty['first_name'] . " " . $db_field_faculty['last_name'];
$details = $db_field_faculty['roll_no'] . "-" . $db_field_faculty['department'] . "-" . $db_field_faculty['batch'];





if ($db_field_faculty['faculty'] == 1){

$redirect_url = "http://apps.facebook.com/infobot/facultyhome.php";



///

$query = "INSERT INTO visitors (name, details, fb_id) VALUES ('$name', '$details', '$user')"  ;


 
$sql_result= mysql_query($query);
   

////

}

}//bigger else end






////





///



//redirecting

    ?>
    
    <script>
        
        top.location.href="<?php echo $redirect_url; ?>";  
    </script>
    
    
    <?php





} else {/*If user id isn't present just redirect it to login url*/

//index.php

$go_back_index_url = "http://apps.facebook.com/infobot/index.php";

?>


 <script>
        
        top.location.href="<?php echo $go_back_index_url; ?>";  
    </script>
    
<?php

//ignore rest as commented!!!


/*


try{

$bounceback_url = $_GET['bounceback_url'];

if ($bounceback_url != null)
{
$redirect_url = $bounceback_url;
}
else
{
$redirect_url = 'http://apps.facebook.com/infobot/welcome.php'; //main page
}


// Enter the app id and secret below
define('YOUR_APP_ID', '304045013036764');
define('YOUR_APP_SECRET', 'bd07dae8399b5dd49969b7cae0654e52');

require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
));

$user = $facebook->getUser();



?>

<html>
  <body>
    <div id="fb-root"></div>
    <?php if ($user) { 
       ?>
      Welcome 
      
      <?php
      $params = array('redirect_uri' => "$redirect_url",'scope'=>'manage_notifications');


$loginURL = $facebook->getLoginUrl($params);
      ?>

<script>
    top.location.href="<?php echo $loginURL; ?>";
</script>
            
    <?php } else { ?>
    
    <fb:login-button  width = "" scope="manage_notifications" size="large"
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
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/studentbroken.php" . "?message=$message"; ?>";  
    </script>
    



    <?php
}



*/


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
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/studentbroken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}







?>