<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




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

$no_permission_redirect = "http://apps.facebook.com/infobot/facultyindex.php?bounceback_url=http://apps.facebook.com/infobot/facultyassignments.php";
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
        var first_name_valid, last_name_valid, fedena_valid, message_valid, file_valid;
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
        
        
        function validate_message(){
        if(document.getElementById("message").value == ""){
        document.getElementById("message").className = "validatefailmessage";
        document.getElementById("toggleMe_message").style.visibility = "visible";
        message_valid = 0;
        }
        else{
        document.getElementById("message").className = "normal";

        document.getElementById("toggleMe_message").style.visibility = "hidden";
        message_valid = 1;
        }
        
        }
        
        function validate_file(){
        
        
        }

        
        
        function checkForm(){
        if(document.getElementById("file").value.length == 0){
        
        document.getElementById("file").className = "validatefailmessage";
        document.getElementById("toggleMe_file").style.visibility = "visible";
        file_valid = 0;
        }
        else{
        document.getElementById("file").className = "normal";

        document.getElementById("toggleMe_file").style.visibility = "hidden";
        file_valid = 1;
        }
        
        
        if (message_valid==1 && file_valid==1 ){
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
							<span><a href="http://apps.facebook.com/infobot/facultybroken.php"  target="_top">Report an Issue/Query</a></span>
						</div>
                        
                        
						<div class="user">
							<span><a  href="http://www.facebook.com/saajan.is" target="_blank">Saajan Shridhar</a> Productions</span>
							
						</div>
					</div>
					
					<div id="launcher-wrapper" class="fixed">
						<div class="logo">
							<a href="http://apps.facebook.com/infobot/facultyindex.php" target="_top"><img src="_layout/images/back-logo.png" alt="" /></a>
						</div>
						
						<div class="launcher">
							<ul class="fixed">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			
            
            
     
     
       
            
        <div class="page_compose_sidebar">

            
          <div id="container">
  
            
              <div id="item1" class="container-item">

            
            <div id="contentdescsidebar" class="page_welcome_description fixed">
		
           
					
					
					
					
					<div id="sidebar">
                
                 <ul id="navigation">
                
                        
                        
                         <li >
							<div><a href="http://apps.facebook.com/infobot/facultymessages.php" target="_top">Messages</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li >
							<div><a href="http://apps.facebook.com/infobot/facultyknowledge.php" target="_top">Knowledge Tips</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li  class = "active">
    						<div><a href="http://apps.facebook.com/infobot/facultyassignments.php" target="_top">Assignments</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li >
							<div><a href="http://apps.facebook.com/infobot/studentverify.php" target="_top">Verify Students</a><span class="icon-nav interface-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li >
							<div><a href="http://apps.facebook.com/infobot/facultypostanalysis.php" target="_top">Post Analysis</a><span class="icon-nav gallery"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li >
							<div><a href="http://apps.facebook.com/infobot/userreports.php" target="_top">User Reports</a><span class="icon-nav gallery"></span></div>
							<div class="back"></div>
						</li>
<li >
							<div><a href="http://apps.facebook.com/infobot/facultysettings.php" target="_top">Settings</a><span class="icon-nav settings"></span></div>
							<div class="back"></div>
						</li>
                        
                        
											</ul>
					<ul id="navigation">
						
					</ul>
				</div>
            </div>
	  </div>
	
            
            
            
            
            
            
            
            
            
            
            
            
            
            
              <div id="item2" class="container-item">

            
            
            
			
			<div class="page_welcome fixed">
				<div id="sidebar">
					<ul id="navigation">
						
					</ul>
				</div>
                
                
                
                
                
                
                
<?php 
///////////start
?>







<?php 
//////////////end
?>
                
                
				
				
				<div id="content2" class="form-elements">
				
					

<?php


try {


require_once("facebook/src/facebook.php");

                        $facebook = new Facebook(array(
                        'appId'  => '304045013036764',
                        'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
                        ));

                        $user = $facebook->getUser();


require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}

$query = "SELECT * FROM user_records WHERE fb_id=$user AND faculty = '1'"  ;


 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

$row = mysql_fetch_row($sql_result);


if ($row == null){

?>
     
     
     <br><br><h12>Sorry, you are not authorized to view this page.</h12>
     
     <?php

exit();
}


?>


				
                
					
					<h8>Student Assignments!</h8><br><br>
                    
                    <div class="notice-three" id="toggleMe_error_bar" style="display: none ;">The form is incomplete!<span></span></div>
                    
                    					<div class="hr"></div>
                                        
                                        
                    <h10>This assignment will be posted on the college's <a href = "http://www.facebook.com/miet.jammu" target="_blank">facebook page</a> and filtered students will be notified.</h10><br><br> <br>                  

                    <h11>Make sure you have liked the college's <a href = "http://www.facebook.com/miet.jammu" target="_blank">facebook page</a> before posting!</h11>


<div class="fb-like" data-href="http://www.facebook.com/miet.jammu" data-send="true" data-width="450" data-show-faces="false"></div>

                       <br><br>  <br>                        
                                                
                  <form action="facultyassignmentsredirect.php" method="post" enctype="multipart/form-data" onsubmit="return checkForm()">
                              
				
                            
                                        
                <input type="hidden" name="user" value = "<?php echo $user; ?>" >                                        
                            
                        <h7>Assignment Description and Instructions:</h7>
 
                            <br><br>
                            <textarea id = "message" name="message" onblur="validate_message()" cols="" rows=""></textarea>
                            <div id="toggleMe_message" style="visibility: hidden;"><span class="input-validate-alert">Please enter a message!</span></div>

                            
                            <br>
                            
                            
                            
                            
                 <h7>Upload Assignment:<br><br><input onfocus="validate_file()"  type="file" name="file" id="file" size = "40"></h7>
                 <div id="toggleMe_file" style="visibility: hidden;"><span class="input-validate-alert">Please upload a valid file!</span></div>
                           
       
                            
                       <br>     
                            
                
                <div class = "hclass">
                <h12>Set filters for students:</h12>
                </div>
                
                
                <div class="col-240"><br>
                            <div class="hr5"></div>

							<h4>Batch</h4><br>
							<h4>Department</h4><br>
                                             <?php /*?> <h4>Semester</h4><br> <?php */?>							
                            
                            </div>
                
                
                
                
            
                <div class="col-400">   
            
                                                                    
             
<br>
<select name="batch" class="normal" autofocus="autofocus">
<?php
echo "<option value='%'>All</option>";
$range = range(2009,2020,1);
foreach ($range as $batch) {
  echo "<option value='$batch'>$batch</option>";
}
echo "</select>";
?>





<br><br>

<select name="department" class="normal" autofocus="autofocus">
echo "<option value='%'>All</option>";
<option value="CSE">Computer Science</option>
<option value="ECE">Electronics & Communication</option>
<option value="EE">Electrical</option>
<option value="IT">Information Technology</option>
<option value="MCA">Master of Computer Application</option>
<option value="MBA">Master of Business Administration</option>
</select>

<? php /*
//commenting semester ?>

<br><br>
<select name="semester" class="normal" autofocus="autofocus">
<?php
echo "<option value='%'>All</option>";
$range = range(1,8,1);
foreach ($range as $sem) {
  echo "<option value='$sem'>$sem</option>";
}
echo "</select>";
?>

<?php */ ?>



<br><br>

</div>



<input type="submit" name="submit" value="Send Assignment!" class="button-blue message"></input>





</form>
               
                            
                            
                            
							
							

							
						</div>
					</div>
				</div>	
			     </div>	
			    </div>
	               
                   
                   
                   
<?php
 /////////php end

} // try end

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
                   
                   
                   
                   
                   
                   
            <div id="footer-wrapper">
            
					<div id="user-wrapper" class="fixed">
                    
                    <div class="userleft">
							<span><a href="http://apps.facebook.com/infobot/facultybroken.php"  target="_top" >Report an Issue/Query</a></span>
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