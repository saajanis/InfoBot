<?php

require_once("error_display.php");

try {


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html dir="ltr" lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>HTML - Admin Pure</title>
		
		<!-- Styles -->
		<link rel='stylesheet' href='_layout/style.css' type='text/css' media='all' />
		
		<!--[if IE]>
		
			<link rel='stylesheet' href='_layout/IE.css' type='text/css' media='all' />		
			
		<![endif]-->
		
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold|PT+Sans+Narrow:regular,bold|Droid+Serif:i&amp;v1' rel='stylesheet' type='text/css' />
		
		<script type='text/javascript' src='../../../ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min97e1.js?ver=1.7'></script>
		<!-- WYSISYG Editor -->
		<script type='text/javascript' src='_layout/scripts/nicEdit/nicEdit.js'></script>
		
		<!-- Forms Elemets --> 
		<script type='text/javascript' src='_layout/scripts/jquery.uniform/jquery.uniform.min.js'></script>
		<link rel='stylesheet' href='_layout/scripts/jquery.uniform/uniform.default.css' type='text/css' media='screen' />
		
		<!-- Scripts -->
		<script type='text/javascript' src='_layout/custom.js'></script>
        
        
        <script language = "javascript">
        var first_name_valid, last_name_valid, roll_no_valid;
        </script>
        
        <script language = "javascript">
        function validate_first_name(){
        if(document.getElementById("first_name").value == ""){
        document.getElementById("first_name").className = "validatefail";
        document.getElementById("toggleMe_first_name").style.visibility = "visible";
        first_name_valid = 0;
        }
        else{
        document.getElementById("first_name").className = "normal";

        document.getElementById("toggleMe_first_name").style.visibility = "hidden";
        first_name_valid = 1;
        }
        
        }
        
        
        
        
        function validate_last_name(){
        if(document.getElementById("last_name").value == ""){
        document.getElementById("last_name").className = "validatefail";
        document.getElementById("toggleMe_last_name").style.visibility = "visible";
        last_name_valid = 0;
        }
        else{
        document.getElementById("last_name").className = "normal";

        document.getElementById("toggleMe_last_name").style.visibility = "hidden";
        last_name_valid = 1;
        }
        
        }   
        
        
        function validate_roll_no(){
        if(document.getElementById("roll_no").value == "" || isNaN(document.getElementById("roll_no").value) == true){
        document.getElementById("roll_no").className = "validatefail";
        document.getElementById("toggleMe_roll_no").style.visibility = "visible";
        roll_no_valid = 0;
        }
        else{
        document.getElementById("roll_no").className = "normal";

        document.getElementById("toggleMe_roll_no").style.visibility = "hidden";
        roll_no_valid = 1;
        }
        
        }
        
        
        function checkForm(){
        if (first_name_valid==1 && last_name_valid==1 && roll_no_valid==1){
        return true;
        }
        else{
        document.getElementById("toggleMe_error_bar").style.display = "";
        return false;
        }
        
        
        }
        </script>

        
        
		
	</head>  
  
	<body>
    
    
    <div id="layout">       
    


    


	 
		
			<div id="header-wrapper">
				<div id="header">
					<div id="user-wrapper" class="fixed">
						
                        <div class="userleft">
							<span><a href="http://apps.facebook.com/infobot/studentbroken.php" target="_top" >Report an Issue/Query</a></span>
						</div>
                        
                        
						<div class="user">
							<span><a  href="http://www.facebook.com/saajan.is" target="_blank">Saajan Shridhar</a> Productions</span>
							
						</div>
					</div>
					
					<div id="launcher-wrapper" class="fixed">
						<div class="logo">
							<a href="http://apps.facebook.com/infobot/index.php" target="_top"><img src="_layout/images/back-logo.png" alt="" /></a>
						</div>
						
						<div class="launcher">
							<ul class="fixed">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			
            
            
     
     
       
            
        <div class="page_compose">

            
          <div id="container">
  
            
              <div id="item1" class="container-item">

            
            <div id="contentdesc" class="page_welcome_description fixed">
		
           
					
					
					
					
					<h7>Get live feed from college!</h7><br><br>
					<div class="hr"></div>
					
                    <br>
                    <img src="_layout/images/notifications.png" alt="" />
                    <br><br>
                    <img src="_layout/images/secure.png" alt="" />
                    <br><br>
                    <img src="_layout/images/anonymous.png" alt="" />
                    <br><br>
                    <img src="_layout/images/access.png" alt="" />
                    
                    <br><br>
                    
                    <img src="_layout/images/post_analysis.png" alt="" />
                    <br><br>
                    <img src="_layout/images/announcements.png" alt="" />
                    
                    <br><br>
                    <img src="_layout/images/control.png" alt="" />
                    
                    
                            		
            </div>
	  </div>
	
            
            
            
            
            
            
            
            
            
            
            
            
            
            
              <div id="item2" class="container-item">

            
            
            
			
			<div class="page_welcome fixed">
				<div id="sidebar">
					<ul id="navigation">
						
					</ul>
				</div>
                
                
                
                
                
                
                
<?php
///////start
?>









<div id="content" class="form-elements">




</div>






<?php
//////////end
?>                
                
                
                
                
                
                
                
                
				
				
				<div id="content" class="form-elements">
				
					




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


<?php



try{





?>

<h10>


<?php






if (1) { /*So now we will have a valid user id with a valid oauth access token and so the code will work fine.*/



require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}





$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);


$roll_no = $_POST['roll_no'];

/*
if (strlen ($roll_no) < 3)
$roll_no = 'NA';
*/

$department = $_POST['department'];
$year = $_POST['year'];
$month = $_POST['month'];
$month = sprintf("%02s", $month);

$day = $_POST['day'];
$day = sprintf("%02s", $day);


$batch = $_POST['batch'];
$batch = substr($batch, -2);



$query = "SELECT students.first_name, students.id FROM students INNER JOIN users INNER JOIN courses INNER JOIN batches ON students.user_id = users.id AND students.batch_id = batches.id AND batches.course_id = courses.id WHERE students.admission_no LIKE '" . "%$roll_no%'" . " AND students.admission_no LIKE '" . "%$batch'" .   " AND courses.code = '" . "$department'" . " AND users.student = '1'"  ;

 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}


$row = mysql_fetch_row($sql_result);


if ($row != null){//1st barrier


$query = "SELECT students.first_name, students.id, users.admin, users.student, users.employee FROM students INNER JOIN users INNER JOIN courses INNER JOIN batches ON students.user_id = users.id AND students.batch_id = batches.id AND batches.course_id = courses.id WHERE students.admission_no LIKE '" ."%$roll_no%'" . " AND students.admission_no LIKE '" . "%$batch'" . " AND date_of_birth LIKE '" . "$year-$month-$day'" .  " AND courses.code = '" . "$department'" ;

 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

$row = mysql_fetch_row($sql_result);


if ($row != null){
echo "<br>All details verified!";


$query = "INSERT INTO user_records (first_name, last_name, roll_no, department, batch, fb_id, student) VALUES ( '$first_name', '$last_name', '$roll_no', '$department', '$batch', '$user', '1')";
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
  
?>
<script>
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/index.php"?>";  
    </script>

<?php
  
}

else{
echo "<br>Your DOB could not be verified with the college databases, this account will be subject to verification later. <br><br>This page will redirect automatically.";



$query = "INSERT INTO user_records (first_name, last_name, roll_no, department, batch, fb_id, is_not_verified, student) VALUES ( '$first_name', '$last_name', '$roll_no', '$department', '$batch', '$user', '1', '1')";

    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}


?>
<script>
setTimeout(function () {
    top.location.href="<?php echo "http://apps.facebook.com/infobot/index.php"?>"; 
},3000); // 3 seconds        

       
    </script>

<?php

}




}//1st if barrier end

else{//1st barrier else

echo "<br>No records found or your records do not match with the college databases.  Click "; 

?> <a href = "http://apps.facebook.com/infobot/student.php" target="_top"> here</a> 

<?php echo " to try again! <br><br> If you think this is an error, report this issue to the admin with your details";
?> <a href = "http://apps.facebook.com/infobot/studentbroken.php" target="_top"> here</a>.

</h10>

<?php



}



} else{/*If user id isn't present just redirect it to login url*/




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


<?php

}//isset if end 




?>







<?php /////////////////////////////// ?>






						</div>
					</div>
				</div>	
			     </div>	
			    </div>
	               
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
            <div id="footer-wrapper">
            
					<div id="user-wrapper" class="fixed">
                    
                    <div class="userleft">
							<span><a href="http://apps.facebook.com/infobot/studentbroken.php"  target="_top" >Report an Issue/Query</a></span>
						</div>
						
						<div class="user">
							
                                                    
                                                    <span><a  href="http://www.facebook.com/saajan.is" target="_blank">Saajan Shridhar</a> Productions</span>
                                                    <br>
                                                    <span><a href="http://www.facebook.com/saajan.is" target="_blank"><img src="_layout/images/facebook-icon.png" alt="" /></a> <a href="http://www.linkedin.com/pub/saajan-shridhar/55/476/786" target="_blank"><img src="_layout/images/linkedin-icon.png" alt="" /></a></span>
                    </div> 
                    
                      
	
	
            </div>
          
    
    
   </div>
                         </div>
   
   
   	
   
   
	 
	</body>
	
</html>








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
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/studentbroken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}

?>