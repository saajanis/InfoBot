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

$no_permission_redirect = "http://apps.facebook.com/infobot/index.php?bounceback_url=http://apps.facebook.com/infobot/studentviewattendance.php";
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
			
            
            
     
     
       
            
        <div class="page_compose_sidebar">

            
          <div id="container">
  
            
              <div id="item1" class="container-item">

            
            <div id="contentdescsidebar" class="page_welcome_description fixed">
		
           
					
					
					
					
					<div id="sidebar">
                
                <ul id="navigation">
                
                        <li >
							<div><a href="http://apps.facebook.com/infobot/studentresults.php" target="_top">Results</a><span class="icon-nav tables"></span></div>
							<div class="back"></div>
						</li>
                        
                        <li class = "active">
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

$query = "SELECT * FROM user_records WHERE fb_id=$user AND student = '1'"  ;


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



				
				
                
					
					<h8>Attendance</h8><br><br>
                    
                    					<div class="hr"></div>

                    
                                                <br>
    <?php
    
             require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}   
                                                                                
                                                
             define('YOUR_APP_ID', '304045013036764');
define('YOUR_APP_SECRET', 'bd07dae8399b5dd49969b7cae0654e52');

require_once("facebook/src/facebook.php");

$facebook = new Facebook(array(
  'appId'  => '304045013036764',
  'secret' => 'bd07dae8399b5dd49969b7cae0654e52',
));

$user = $facebook->getUser();

$query = "SELECT * FROM user_records where fb_id = '". "$user" . "'";


$sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

$row = mysql_fetch_row($sql_result);

$first_name = $row[0];
$last_name = $row[1];
$name = "$first_name" . " " . "$last_name";
$batch = substr($row[4], -2);
$roll_no = $row[2] . "/" . "$batch";

?>


<h12><?php echo $name ?></h12><h13><?php echo $roll_no ?></h13>  <br><br>



                                   
            <table class="normal-table m-bot-30" cellspacing='0'> 
							<thead> 
								<tr> 
									<th class="first thserial">Serial No</th> 
									<th class="thsubject">Subject</th> 
									<th class="thnormal">Lectures attended</th> 
									<th class="thnormal">Total lectures</th> 
									<th class="thnormal">Percentage</th> 
								</tr> 
							</thead> 
                            
                            
                           <tbody>  
                            
                            
                            








                           
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
							
                                
							 
					



<?
/////// php start
?>






<?php


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










function get_student ($name, $roll_no, $batch, $department){

$query = "SELECT students.id, students.batch_id FROM students INNER JOIN courses INNER JOIN batches ON students.batch_id = batches.id AND batches.course_id = courses.id WHERE students.admission_no LIKE '" . "%$roll_no" . "%'" . " AND students.admission_no LIKE '" . "%$batch'" . " AND courses.code like '" . "$department" . "'";

// echo "<br>1 $query";

$sql_result = mysql_query($query);
   if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

$row = mysql_fetch_row($sql_result);

   
$student_id = $row[0];
$batch_id = $row[1];

 get_subjects ($roll_no, $batch, $student_id, $batch_id);
 
 
 return null;
 
 }//func end








function find_shortage ($serial, $roll_no, $batch, $student_id, $subject_id, $subject_name){







//////






$year = date("Y");
$year_back = $year;

$month = date("m");
$date = date("d");
$sem_months_back = 0;

if ($month>=2 && $month<=7) 
{ $sem_months_back = 2; }

else
{ $sem_months_back = 8; }


if ($month==1 )
{ $year_back = $year-1; }


//absents

$query = "SELECT subjects.code, subjects.name, period_entries.month_date, period_entries.subject_id, attendances.period_table_entry_id FROM period_entries INNER JOIN attendances INNER JOIN subjects ON period_entries.id = attendances.period_table_entry_id AND subjects.id = period_entries.subject_id where student_id = '" . "$student_id".  "' AND period_entries.subject_id = '" . "$subject_id" . "' AND period_entries.month_date BETWEEN '" . "$year_back" . "-" . "$sem_months_back" . "-1' AND '" . "$year" . "-" . "$month" . "-$date'";  //month thing divided into three

// echo "<br><br>dadaa $query";

 //month thing divided into three
    
    
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $lectures_absent = mysql_num_rows ( $sql_result ); //absent_count
    
//lab exists
$query = "SELECT code FROM subjects WHERE id = '" . "$subject_id" . "'";
    
    
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $subject = $row[0];
    
// total


$query = "SELECT * FROM period_entries WHERE subject_id = '" . "$subject_id" . "' AND" . " month_date BETWEEN '" . "$year_back" . "-" . "$sem_months_back" . "-1' AND '" . "$year" . "-" . "$month" . "-$date' ";

// echo "<br><br>2 $query";

    
    
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}
    
    $lectures_total = mysql_num_rows ( $sql_result ); //total_count
    
    //half total if lab
    
    $found = strpos ( $subject_name, "/" );
    
    if ($found != false){
    
    if (1) { //extra lectures fix
    $lectures_total = $lectures_total/2;
    }
    
    }
    
    $lectures_total = round ($lectures_total);
    
    if ($lectures_absent === 0 || $lectures_total === 0){
        
            $subject_percentage = "NA";
            
            }
    else{       
                
                
     $lectures_attended = ($lectures_total-$lectures_absent) ;          
    $subject_percentage = ($lectures_attended/($lectures_total))*100;

    $subject_percentage = round($subject_percentage, 2);


    }
    
    

//////////
?>


<tr> 
									<td class="tdserial"><?php echo $serial;?></td> 
									<td class="thsubject"><?php if ($found != false){ echo $subject_name;?> <br> <?php echo "(Group 1    /    Group 2)"; } else {echo $subject_name;} ?></td> 
									<td class="thnormal"><?php echo $lectures_attended;?></td> 
									<td class="thnormal"><?php echo $lectures_total;?></td> 
									<td class="thnormal"><?php if ($subject_percentage !== "NA") {echo "$subject_percentage%";} else {echo "NA";}?></td> 
								</tr>


<?php

return null;

}//func end





function get_subjects ($roll_no, $batch, $student_id, $batch_id){


$six_months_back_date = date("Y-m-d H:i:s", strtotime("-6 months"));
$current_date = date ("Y-m-d H:i:s");

$year = date("Y");


$month = date("m");
$date = date("d");
$year_back = $year-1;
$year_back_back = $year-2;
$year_after = $year+1;

$sem_months_back = 0;

if ($month>=2 && $month<=8) 
{ $sem_months_back = 2; }

else
{ $sem_months_back = 8; }


$jumper_2012 = 2012;
$jumper_year = $year;
$jumper_year_back = $year_back;
$jumper_year_after = $year_after;
$jumper_year_back_back = $year_back_back;

if ($month>=1 && $month<=2)
{ 
$jumper_2012++; //can jump to 2013
$jumper_year++;
$jumper_year_back++;
$jumper_year_after++;
$jumper_year_back_back++;


}




$query = "SELECT id, name FROM `subjects` WHERE batch_id = '" . "$batch_id" . "'" . " AND is_deleted = '0'";

//echo "<br><br> $query";

    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

    $row = mysql_fetch_row($sql_result);
    
    $serial = 0;
    
    
    
    
    while($row != null){
  
    $serial ++;
    
    
    $subject_id = $row[0] ;
    $subject_name = $row[1] ;

    
    find_shortage ($serial, $roll_no, $batch, $student_id, $subject_id, $subject_name);
    $row = mysql_fetch_row($sql_result);
    
    }//while end


}//func end





////////////









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

$query = "SELECT * FROM user_records WHERE fb_id=$user AND student = 1"  ;

 $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

$row = mysql_fetch_row($sql_result);


if ($row == null){

echo "<br>You are not authorised to view this page!";
exit();
}


$query = "SELECT * FROM user_records WHERE  fb_id LIKE '$user'";
    $sql_result = mysql_query($query);
    if(!$sql_result) {throw new Exception("'table access error', QUERY = $query, Error = " . mysql_error());}

$row = mysql_fetch_row($sql_result);


$name = $row[0] . " " . $row[1];
$roll_no = $row[2];
$department = $row[3];
$batch = $row[4];
$batch = substr($batch, -2);

get_student ($name, $roll_no, $batch, $department);




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







<php /////////////////////////////// ?>









                        </tbody>
                        </table>


                      <br>
                      <h17>Please note that this data is depictive and may be wrong as it is<br> subject to daily updation by your respective faculty.</h17>





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