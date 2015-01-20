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

$no_permission_redirect = "http://apps.facebook.com/infobot/facultyindex.php?bounceback_url=http://apps.facebook.com/infobot/studentverify.php";
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
                        
                        <li >
							<div><a href="http://apps.facebook.com/infobot/facultyknowledge.php" target="_top">Knowledge Tips</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li >
            				<div><a href="http://apps.facebook.com/infobot/facultyassignments.php" target="_top">Assignments</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        
                        <li class = "active">
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






//UNVERIFIED ACCOUNTS
////////////////////////

?>


<h8>Unverified accounts:</h8><br><br>

<div class="hr"></div>





<table class="normal-table m-bot-30" cellspacing='0'> 
							<thead> 
								<tr> 
									<th class="first thnarrow">Name</th> 
									<th class="thnarrow">Roll No</th> 
									<th class="thnarrow">Batch</th> 
									<th class="thnarrow">Dept.</th> 
									<th class="thnarrow">Profile Link</th> 
									<th class="thsubject">Mark as Valid</th>
									<th class="thsubject">Mark as Fake</th>
								</tr> 


<?php




//NOT VERIFIED

$query = "Select * from user_records WHERE is_not_verified = '1'";
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

    $row = mysql_fetch_row($sql_result);





do{

$first_name = $row[0];
$last_name = $row[1];
$name = $first_name . " " . $last_name;
$roll_no = $row[2];
$department = $row[3];
$batch = $row[4];
$fb_id = $row[5];
$link = "http://www.facebook.com/$fb_id";


?>


                    
                    					

                    
                                             
                                                
                                                
            
							</thead> 
                            
                            


                                                       <tr> 
									<td class="thnarrow"><?php echo $name;?></td> 
                                    <td class="thnarrow"><?php echo $roll_no;?></td> 
                                    <td class="thnarrow"><?php echo $batch;?></td> 
                                    <td class="thnarrow"><?php echo $department;?></td> 
									<td class="thsubject"><a href="<?php echo $link; ?>" target="_blank">Facebook Profile</a></td> 
									<td class="thnarrow"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>">
<input type="hidden" name="batch" value="<?php echo $batch; ?>">
<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
<input type='submit' name='Valid' value='Valid'class = "button-blue-light"/>
</form></td>

<td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>">
<input type="hidden" name="batch" value="<?php echo $batch; ?>">
<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
<input type='submit' name='Delete' value='Delete' class = "button-grey"/>
</form></td> 
								</tr>
                           <tbody>  






<?php

$row = mysql_fetch_row($sql_result);

}while ($row != null); //do while end

?>
</table>



<?php
//1FB_ID MANY ROLL NOS
//////////////////////
?>




<h8>One Facebook account registered against many Roll Nos :</h8><br><br>

<div class="hr"></div>





<table class="normal-table m-bot-30" cellspacing='0'> 
							<thead> 
								<tr> 
                                    <th class="first thnarrow">Profile Link</th> 
                                    <th class="thnarrow">Count</th> 
									<th class="thnarrow">Name</th> 
									<th class="thnarrow">Roll No</th> 
									<th class="thnarrow">Batch</th> 
									<th class="thnarrow">Dept.</th> 
									
									<th class="thsubject">Mark as Valid</th>
									<th class="thsubject">Mark as Fake</th>
								</tr> 


<?php




//NOT VERIFIED

$query = "SELECT * , COUNT( fb_id ) FROM user_records
GROUP BY fb_id
HAVING COUNT( fb_id ) >1
ORDER BY COUNT( fb_id ) DESC";
    $sql_result_out = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

    $row = mysql_fetch_row($sql_result_out);




do{

$fb_id_out = $row[5];
$count = $row[15];
$link = "http://www.facebook.com/$fb_id_out";



$query = "SELECT * FROM user_records
WHERE fb_id = '". "$fb_id_out'";
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    ?>
    
    
    
    </thead> 
                            
                            


                                                       <tr> 
                                    <td class="thnarrow"><a href="<?php echo $link; ?>" target="_blank">Facebook Profile</a></td> 
                                    <td class="thnarrow"><?php echo $count;?></td> 
                                    <td class="thnarrow">==></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
									
									<td class="thnarrow"></td>

                                    <td class="thnarrow"></td> 

                                    </tr>
    
<?php
    $row_in = mysql_fetch_row($sql_result);

    do{
    
    $first_name = $row_in[0];
    $last_name = $row_in[1];
    $name = $first_name . " " . $last_name;
    $roll_no = $row_in[2];
    $department = $row_in[3];
    $batch = $row_in[4];
    $fb_id = $row_in[5];
    $link = "http://www.facebook.com/$fb_id";
    




?>


            
                                                
                                                
                                
                            
                            


                                                       <tr> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"><?php echo $name;?></td> 
                                    <td class="thnarrow"><?php echo $roll_no;?></td> 
                                    <td class="thnarrow"><?php echo $batch;?></td> 
                                    <td class="thnarrow"><?php echo $department;?></td> 
									
									<td class="thnarrow"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>">
<input type="hidden" name="batch" value="<?php echo $batch; ?>">
<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
<input type='submit' name='Valid' value='Valid'class = "button-blue-light"/>
</form></td>

<td class="thnarrow"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>">
<input type="hidden" name="batch" value="<?php echo $batch; ?>">
<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
<input type='submit' name='Delete' value='Delete' class = "button-grey"/>
</form></td> 
								</tr>
                           <tbody>  






<?php
    
    
    $row_in = mysql_fetch_row($sql_result);

    }while ($row_in != null); //do while end
    
    
    ?>
    
     <tr> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
									
									<td class="thnarrow"></td>

                                    <td class="thnarrow"></td> 

                                    </tr>
    
    
    <?php


    $row = mysql_fetch_row($sql_result_out);

}while ($row != null); //do while end









?>
</table>







<?php
//1 roll_no many fb_ids
//////////////////////
?>



<h8>One Roll No registered with multiple facebook accounts:</h8><br><br>

<div class="hr"></div>





<table class="normal-table m-bot-30" cellspacing='0'> 
							<thead> 
								<tr> 
                                    <th class="first thnarrow">Roll No</th> 
                                    <th class="thnarrow">Batch</th> 
									<th class="thnarrow">Count</th> 
									<th class="thnarrow">Name</th> 
									<th class="thnarrow">Dept.</th> 
									<th class="thnarrow">Facebook Profile</th> 
									
									<th class="thsubject">Mark as Valid</th>
									<th class="thsubject">Mark as Fake</th>
								</tr> 


<?php




//NOT VERIFIED

$query = "SELECT * , COUNT( roll_no ) FROM user_records
GROUP BY roll_no, batch
HAVING COUNT( roll_no ) >1 AND COUNT( batch ) >1
ORDER BY COUNT( roll_no ) DESC";
    $sql_result_out = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

    $row = mysql_fetch_row($sql_result_out);




do{

$roll_no = $row[2];
$batch = $row[4];
$count = $row[15];


$query = "SELECT * FROM user_records
WHERE roll_no = '". "$roll_no'";
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    ?>
    
    
    
    </thead> 
                            
                            


                                                       <tr> 
                                    <td class="thnarrow"><?php echo $roll_no; ?></td> 
                                    <td class="thnarrow"><?php echo $batch;?></td> 
                                    <td class="thnarrow"><?php echo $count;?></td> 
                                    <td class="thnarrow">==></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
									
									<td class="thnarrow"></td>

                                    <td class="thnarrow"></td> 

                                    </tr>
    
<?php
    $row_in = mysql_fetch_row($sql_result);

    do{
    
    $first_name = $row_in[0];
    $last_name = $row_in[1];
    $name = $first_name . " " . $last_name;
    $roll_no = $row_in[2];
    $department = $row_in[3];
    $batch = $row_in[4];
    $fb_id = $row_in[5];
    
    $link = "http://www.facebook.com/$fb_id";




?>


            
                                                
                                                
                                
                            
                            


                                                       <tr> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"><?php echo $name;?></td> 
                                    <td class="thnarrow"><?php echo $department;?></td> 
                                    <td class="thnarrow"><a href="<?php echo $link; ?>" target="_blank">Facebook Profile</a></td> 
									
									<td class="thnarrow"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>">
<input type="hidden" name="batch" value="<?php echo $batch; ?>">
<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
<input type='submit' name='Valid' value='Valid'class = "button-blue-light"/>
</form></td>

<td class="thnarrow"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>">
<input type="hidden" name="batch" value="<?php echo $batch; ?>">
<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
<input type='submit' name='Delete' value='Delete' class = "button-grey"/>
</form></td> 
								</tr>
                           <tbody>  






<?php
    
    
    $row_in = mysql_fetch_row($sql_result);

    }while ($row_in != null); //do while end
    
    
    ?>
    
     <tr> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
                                    <td class="thnarrow"></td> 
									
									<td class="thnarrow"></td>

                                    <td class="thnarrow"></td> 

                                    </tr>
    
    
    <?php


    $row = mysql_fetch_row($sql_result_out);

}while ($row != null); //do while end









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
    
    
  
	