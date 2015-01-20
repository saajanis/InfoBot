<div id="fb-root"></div>
    <script>
      //initializing API
      window.fbAsyncInit = function() {
        FB.init({appId: '304045013036764', status: true, cookie: true,
                 xfbml: true, // channel.html file
                 oauth  : true
                 });
                 FB.Event.subscribe('auth.login', function(response) {
                 FB.api('/me', function(response){});

                 });
                 
                 };
     
    </script>





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

$no_permission_redirect = "http://apps.facebook.com/infobot/index.php?bounceback_url=http://apps.facebook.com/infobot/welcome.php";
?>
<script>
        
        top.location.href="<?php echo $no_permission_redirect; ?>";  
</script>
<?php


}

?>





<?php





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
        var first_name_valid, last_name_valid, fedena_valid;
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
        
        
        function validate_fedena(){
        if(document.getElementById("fedena").value == ""){
        document.getElementById("fedena").className = "validatefail";
        document.getElementById("toggleMe_fedena").style.visibility = "visible";
        fedena_valid = 0;
        }
        else{
        document.getElementById("fedena").className = "normal";

        document.getElementById("toggleMe_fedena").style.visibility = "hidden";
        fedena_valid = 1;
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
							<span><a href="http://apps.facebook.com/infobot/studentbroken.php"  target="_top">Report an Issue/Query</a></span>
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

            
            <div id="contentdesc1" class="page_welcome_description fixed">
		
           
					
					
					
					
					<h7>Live feed from college!</h7><br><br>
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
                
                
				
				
				<div id="content" class="form-elements">
				
					
				
                
					
					<h8>Choose your account type!</h8><br><br>
                    
                    					<div class="hr"></div>

                    
                                                <br><br><br><br><br>
							
							
							<span><a  href="http://apps.facebook.com/infobot/student.php"  target="_top">
<input type="submit" name="Student" value="Student" class="button-orange-register"/></a></span>

<div class = "hr1"> </div>






                            <span><a  href="<?php echo "http://apps.facebook.com/infobot/faculty.php";?>"  target="_top">
<input type="submit" name="Faculty" value="Faculty" class="button-orange-register"/></a></span>
							
						</div>
					</div>
				</div>	
			     </div>	
			        </div>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
            <div id="footer-wrapper">
            
					<div id="user-wrapper" class="fixed">
                    
                    <div class="userleft">
							<span><a href="http://apps.facebook.com/infobot/studentbroken.php"  target="_top">Report an Issue/Query</a></span>
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
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/facultybroken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}

?>
	
	