


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
			
            
            
     
     
       
            
        <div class="page_compose_sidebar">

            
          <div id="container">
  
            
              <div id="item1" class="container-item">

            
            <div id="contentdescsidebar" class="page_welcome_description fixed">
		
           
					
					
					
					
					<div id="sidebar">
                
                <ul id="navigation">
                
                        <li class = "active" >
							<div><a href="http://apps.facebook.com/infobot/studentresults.php" target="_top">Results</a><span class="icon-nav tables"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li>
							<div><a href="http://apps.facebook.com/infobot/studentviewattendance.php" target="_top">Attendance</a><span class="icon-nav calendar"></span></div>
							<div class="back"></div>
						</li>
                        
                        
                        <li>
            				<div><a href="http://apps.facebook.com/infobot/studentassignments.php" target="_top">Assignments</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>
                        
                        
                        <li>
							<div><a href="http://apps.facebook.com/infobot/studentquery.php" target="_top">Make a Query</a><span class="icon-nav users"></span></div>
							<div class="back"></div>
						</li> 
                        
                        
                        
                        
                        <li>
							<div><a href="http://apps.facebook.com/infobot/studenthomemessages.php" target="_top">Messages</a><span class="icon-nav form-elements"></span></div>
							<div class="back"></div>
						</li>         

<li>
							<div><a href="http://apps.facebook.com/infobot/studentsettings.php" target="_top">Settings</a><span class="icon-nav settings"></span></div>
							<div class="back"></div>
						</li>  
               
											</ul>
					<ul id="navigation">
						
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
                
                
				
				
				<div id="content1" class="form-elements">
				
					
				
                
					
					<h8>Results</h8><br><br>
                    
                    					<div class="hr"></div>

                    
                                                <br>
                                                
                                                
            
                            
                            
                            
<?php
///////////// php start
?>






<?php




require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}


$attributes = (explode(',', $_POST['attributes']));

$roll_no = $attributes[0];
$batch = $attributes[1];
$student_id = $attributes[2];
$batch_id = $attributes[3];


$exam_id_all = $attributes[4];
$exam_group_id = $_POST['exam_group_id'] . "^"; // ^ for strtok single result case not dislaying problem
$name = $_POST['name'];


////

define('YOUR_APP_ID', '304045013036764');
define('YOUR_APP_SECRET', 'bd07dae8399b5dd49969b7cae0654e52');

require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
));

$user = $facebook->getUser();

$query = "SELECT * FROM user_records where fb_id = '". "$user" . "'";



$roll_no = $roll_no . "/" . "$batch";

?>


<h12><?php echo $name ?></h12><h13><?php echo $roll_no ?></h13>  <br><br>





<?php



$exam_group_id_broken = strtok($exam_group_id, "*^");




        while ($exam_group_id_broken !== false) 

        {
   









////

$query = "SELECT name FROM exam_groups WHERE id = '" . "$exam_group_id_broken" ."'" ;



$sql_result_name = mysql_query($query);
    if(!$sql_result_name) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $row = mysql_fetch_row($sql_result_name);
    
$exam_group_name = $row[0] . " :";
?>

<?php if (strpos($exam_group_id, '*') ) { ?>
<h3><br> <?php echo $exam_group_name ?> </h3> 

<?php } ?>

<table class="normal-table m-bot-30" cellspacing='0'> 
							<thead> 
								<tr> 
									<th class="first thserial">Serial No</th> 
									<th class="thsubject">Subject</th> 
									<th class="thnormal">Marks Obtained</th> 
									<th class="thnormal">Maximum Marks</th> 
									<th class="thnormal">Percentage</th> 
								</tr> 
							</thead> 
                            
                            
                           <tbody>  


<?php
$query = "SELECT subjects.name, exam_scores.marks, exams.maximum_marks, exam_scores.remarks  FROM subjects INNER JOIN exam_scores INNER JOIN exams ON exams.subject_id = subjects.id AND exams.id = exam_scores.exam_id WHERE exam_scores.student_id = '". "$student_id" . "' AND exams.exam_group_id = '" . "$exam_group_id_broken" ."'" ;


$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    
    
    

$row = " ";


$serial = 0;


while ($row = mysql_fetch_row($sql_result)){


$serial ++;


$subject_name = $row[0];
$subject_marks = $row[1];
$subject_max_marks = $row[2];
$remarks = $row[3];


if ($remarks != ''){
$subject_marks = $subject_marks . " (" . $remarks . ") ";
}


if ($subject_marks !==NULL) {
$subject_percentage = ($subject_marks/$subject_max_marks)* 100;

$subject_percentage = $subject_percentage . "%";
}
else {
$subject_percentage = "NA";
}


?>








                           
                            
                            
                            
                            
                            
                            
                            
                            
                          
                            
                            
							
                                <tr> 
									<td class="tdserial"><?php echo $serial;?></td> 
									<td class="thsubject"><?php echo $subject_name;?></td> 
									<td class="thnormal"><?php echo $subject_marks;?></td> 
									<td class="thnormal"><?php echo $subject_max_marks;?></td> 
									<td class="thnormal"><?php echo "$subject_percentage";?></td> 
								</tr>
							 
					





<?php


}//while end





?>



                        </tbody>
                        </table>

<?php


$exam_group_id_broken = strtok("*^");
 
        }//while end




?>

<?php

///////// php end

?>
               
							
                        
							
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
        
        top.location.href="<?php echo "http://apps.facebook.com/infobot/studentbroken.php" . "?message=$message"; ?>";  
    </script>
    
    <?php
}

?>
	
	