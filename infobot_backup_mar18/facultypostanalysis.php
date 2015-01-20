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

$no_permission_redirect = "http://apps.facebook.com/infobot/facultyindex.php?bounceback_url=http://apps.facebook.com/infobot/facultypostanalysis.php";
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
        var first_name_valid, last_name_valid, fedena_valid, message_valid;
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

        
        
        function checkForm(){
        if (message_valid==1 ){
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
                        
                        <li  >
							<div><a href="http://apps.facebook.com/infobot/facultyknowledge.php" target="_top">Knowledge Tips</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li >
            				<div><a href="http://apps.facebook.com/infobot/facultyassignments.php" target="_top">Assignments</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        
                        <li >
							<div><a href="http://apps.facebook.com/infobot/studentverify.php" target="_top">Verify Students</a><span class="icon-nav interface-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li class = "active">
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
                
                
                
         
         
         	<div id="content2" class="form-elements">

                
                       
    
<?php


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


                          
                                            
                
                
                
<?php 
///////////start
?>




<?php




if($_POST['Valid'])
{
require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}


$roll_no = $_POST['roll_no'];
$batch = $_POST['batch'];
$fb_id = $_POST['fb_id'];

$query = "UPDATE user_records SET is_not_verified = '0' WHERE roll_no = '" . "$roll_no'" . "AND batch ='" . "$batch'" . "AND fb_id = '" . "$fb_id'";
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
}

if($_POST['Delete'])
{
require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}


$roll_no = $_POST['roll_no'];
$batch = $_POST['batch'];
$fb_id = $_POST['fb_id'];
$query = "DELETE FROM user_records WHERE roll_no = '" . "$roll_no'" . "AND batch ='" . "$batch'" . "AND fb_id = '" . "$fb_id'";
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    }

?>









<?php

require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}





//POST ANALYSIS
////////////////////////

?>


<h8>Post Analysis:</h8><br><br>

<div class="hr"></div>





<table class="normal-table m-bot-30" cellspacing='0'> 
							<thead> 
								<tr> 
									<th class="first thnarrow">MessagePostedOnPage</th> 
									<th class="thnarrow">Likes</th> 
									<th class="thnarrow">Comments</th> 
									<th class="thnarrow">Profile Link</th> 
									<th class="thsubject">Wall Post Link</th>
									
								</tr> 


<?php



require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
));

$unix_date  = time();


$posts = $facebook->api(array(
    "method" => "fql.query",
    "query" => "SELECT post_id, actor_id, target_id, message, claim_count, likes, share_count, comments FROM stream WHERE source_id=375747506036 AND app_id = 304045013036764 AND created_time < " . "$unix_date" . "   LIMIT 1000000 "

   
    ));
   

// var_dump ($posts);




$query = "Delete FROM faculty_posts";
 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}








foreach ($posts as $posts){

$post_id = $posts['post_id'];
$actor_id = $posts['actor_id'];
$likes_count = $posts['likes']['count'];
$comments_count = $posts['comments']['count'];
$message = $posts['message'];
$message = mysql_real_escape_string ($message); 



$query = "INSERT INTO faculty_posts (message, post_id, likes, comments, actor_id) VALUES ('$message' , '$post_id', '$likes_count', '$comments_count', '$actor_id' )";
 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}



}//foreach end





$query = "SELECT message, post_id, likes, comments, actor_id, SUM(likes+2*comments) AS sum FROM faculty_posts GROUP BY message ORDER BY sum DESC";
 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}



while($db_field = mysql_fetch_assoc($sql_result)){

$post_id = $db_field['post_id'];
$actor_id = $db_field['actor_id'];
$likes_count = $db_field['likes'];
$comments_count = $db_field['comments'];
$message = $db_field['message'];

$itr = 0;

$post_broken = strtok($post_id, "_");

while ($post_broken !== false) {

if($itr == 0)
$page_id = $post_broken;

if($itr == 1) 
$story_id = $post_broken;

$itr ++;
$post_broken = strtok("_");
}//while end






$story_link = "http://www.facebook.com/permalink.php?id=$page_id&v=wall&story_fbid=$story_id";

$profile_link = "http://www.facebook.com/$actor_id";

?>





</thead> 
                            
                            


                                                       <tr> 
									<td class="thnarrow"><?php echo $message;?></td> 
                                    <td class="thnarrow"><?php echo $likes_count;?></td> 
                                    <td class="thnarrow"><?php echo $comments_count;?></td> 
                                    <td class="thsubject"><a href="<?php echo $profile_link; ?>" target="_blank">Facebook Profile</a></td>
                                    <td class="thsubject"><a href="<?php echo $story_link; ?>" target="_blank">Wall Post</a></td>
                                     
                                    								</tr>
                           <tbody>  













<?php




}//while end






?>


</table>


<?php 
//////////////end
?>
                
                
				
				
				
					
				
                
					
    
                            
                            
                            
							
							

							
						</div>
					</div>
				</div>	
			     </div>	
			    </div>
	               
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
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
  
	