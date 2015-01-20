<?php



require_once("error_display.php");

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

$no_permission_redirect = "http://apps.facebook.com/infobot/facultyindex.php?bounceback_url=http://apps.facebook.com/infobot/faculty.php";
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
							<span><a href="http://apps.facebook.com/infobot/facultybroken.php"  target="_top" >Report an Issue/Query</a></span>
						</div>
                        
                        
						<div class="user">
							<span><a  href="http://www.facebook.com/saajan.is">Saajan Shridhar</a> Productions</span>
							
						</div>
					</div>
					
					<div id="launcher-wrapper" class="fixed">
						<div class="logo">
							<a href="http://apps.facebook.com/infobot/facultyhome.php" target="_top"><img src="_layout/images/back-logo.png" alt="" /></a>
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
	
            
            
  
            
                      


<?php
///////start
?>



<div id="content" class="form-elements">


</div>








<?php
///////end
?>
            
            
            
            
            
            
            
            
            
            
            
              <div id="item2" class="container-item">

            
            
            
			
			<div class="page_welcome fixed">
				<div id="sidebar">
					<ul id="navigation">
						
					</ul>
				</div>
                
                
				
				
				<div id="content" class="form-elements">
				
					
				
                
					
					<h1>Sign up as faculty!</h1>
                    
                    <div class="notice-three" id="toggleMe_error_bar" style="display: none ;">The form is incomplete!<span></span></div>

                    
					<div class="hr"></div>
					<div class="fixed form-elements-inputs">
						<div class="col-240">
							<h4>First Name</h4><br>
							<h4>Middle Name</h4>
                            <div class = "hr2"> </div>
							<h4>Last name</h4><br>
							<h4>Fedena Username</h4><br><br>
							<h4>Department</h4><br>
							<h4>Date of Birth:</h4>
							<h4>Year</h4>
							<h4>Month</h4>
							<h4>Day</h4>
                            <br><br><br>
                            
                            
							
						</div>
						                        
                        
                        <div class="col-400">
                        
                        
                        
                        <form action="facultyregisterredirect.php" method="post" enctype="multipart/form-data" onsubmit="return checkForm()" >


                            <input type="hidden" name="user" value = "<?php echo $user; ?>" >

                            <input name = "first_name" onblur="validate_first_name()" id= "first_name" class="normal" autofocus="autofocus" type="text" value="First Name" onfocus="if (this.value=='First Name') this.value='';"/>
                                <div id="toggleMe_first_name" style="visibility: hidden;"><span class="input-validate-alert">Please enter a first name!</span></div>
                            <input name = "middle_name" onblur="validate_middle_name()" id= "middle_name" class="normal" autofocus="autofocus" type="text" value="Middle Name" onfocus="if (this.value=='Middle Name') this.value='';"/>
                                <div id="toggleMe_middle_name" style="visibility: hidden;"><span class="input-validate-alert"> . </span></div>
                            <input name = "last_name" onblur="validate_last_name()" id= "last_name" class="normal" autofocus="autofocus" type="text" value="Last Name" onfocus="if (this.value=='Last Name') this.value='';"/>
                                <div id="toggleMe_last_name" style="visibility: hidden;"><span class="input-validate-alert">Please enter a last name!</span></div>
                                
                                <div class = "hr4"> </div>

                            
                           
                            <input name = "fedena_uid" onblur="validate_fedena()" id= "fedena" class="normal" autofocus="autofocus" type="text" value="Fedena Username" onfocus="if (this.value=='Fedena Username') this.value='';"/>
                            <span class="input-text">(Example CSE01)</span>

                                <div id="toggleMe_fedena" style="visibility: hidden;"><span class="input-validate-alert">Please check your Fedena Username!</span></div>



<div class = "hr2"> </div>

                            <select class="normal" autofocus="autofocus" name="department">
                        
<option value="CSE">Computer Science</option>
<option value="ECE">Electronics & Communication</option>
<option value="EE">Electrical</option>
<option value="IT">Information Technology</option>
<option value="MCA">Master of Computer Application</option>
<option value="MBA">Master of Business Administration</option>

</select>

    


<div class = "hr4"> </div>

<br><br>
<span class="input-text">Your DOB should match with college database!</span>
<br>


<select class="normal" autofocus="autofocus" name="year">
<?php
$range = range(2006,1930,1);
foreach ($range as $batch) {
  echo "<option value='$batch'>$batch</option>";
}
?>
</select>

<select class="normal" autofocus="autofocus" name="month">
<?php
$range = range(01,12,1);
foreach ($range as $batch) {
  echo "<option value='$batch'>$batch</option>";
}

?>
</select>

<select class="normal" autofocus="autofocus" name="day">
<?php
$range = range(01,31,1);
foreach ($range as $batch) {
  echo "<option value='$batch'>$batch</option>";
}

?>
</select>


                            
                            							
                            
                            <br><br><br>
							
							
							<input type="submit" name="submit" value="Submit" class="button-orange"/>
</form>
							
						</div>
					</div>
				</div>	
			     </div>	
			    </div>    </div>
                         </div>
	               
                   
                   
                   
                   
 
                   
               
                   
                   
                   
                   
                   
                   
            <div id="footer-wrapper">
            
					<div id="user-wrapper" class="fixed">
                    
                    <div class="userleft">
							<span><a href="http://apps.facebook.com/infobot/facultybroken.php"  target="_top">Report an Issue/Query</a></span>
						</div>
						
						<div class="user">
							
                                                    
                                                    <span><a  href="http://www.facebook.com/saajan.is" target="_blank">Saajan Shridhar</a> Productions</span>
                                                    <br>
                                                    <span><a href="http://www.facebook.com/saajan.is" target="_blank"><img src="_layout/images/facebook-icon.png" alt="" /></a> <a href="http://www.linkedin.com/pub/saajan-shridhar/55/476/786" target="_blank"><img src="_layout/images/linkedin-icon.png" alt="" /></a></span>
                    </div> 
                    
                      
	
	
            </div>
          
    

   
   
   
   	
   
   
	 
	</body>
	
</html>
	
	
    