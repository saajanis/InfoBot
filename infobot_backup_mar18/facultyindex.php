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




$bounceback_url = $_GET['bounceback_url'];

if ($bounceback_url != null)
{
$redirect_url = $bounceback_url;
}
else
{
$redirect_url = 'http://apps.facebook.com/infobot/bouncer.php'; //main page
}






try{


require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
  'fileUpload'  => true
));

$access_token = $facebook->getAccessToken();
$facebook->setAccessToken($access_token);


$user_id = $facebook->getUser();


$params = array(
  'scope'=>'publish_stream, manage_notifications',
  'redirect_uri' =>  "$redirect_url"
);

$loginUrl = $facebook->getLoginUrl($params);

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











<script>
        
        top.location.href="<?php echo $loginUrl; ?>";  
</script>