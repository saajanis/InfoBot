<?php



ini_set('memory_limit', '-1');

set_time_limit(0);


include "sync.php";
    
    
    
    
   
   function update_last_sync_table ($table_current, $time){
   
   $db_server = mysql_connect("saajanisfedina.db.10570337.hostedresource.com", "saajanisfedina","iPhone1@1");
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysql_select_db("saajanisfedina")
 or die ("Unable to select database" .mysql_error());
print "Connection Succeeded";
   
   
   $query = "UPDATE sync_status SET last_table_synced = '" . "$table_current" . "' , timestamp = '" . "$time" . "' WHERE id = '0'";
$sql_result_internal = mysql_query($query);
if(!$sql_result_internal) die ("//Database access failed: " .mysql_error());

    
     
    } 
     
       
    

///

 $db_server = mysql_connect("saajanisfedina.db.10570337.hostedresource.com", "saajanisfedina","iPhone1@1");
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysql_select_db("saajanisfedina")
 or die ("Unable to select database" .mysql_error());
print "Connection Succeeded";

$query = "SELECT * FROM sync_status WHERE id = '0'";
$sql_result_local = mysql_query($query);
if(!$sql_result_local) die ("//Database access failed: " .mysql_error());

$local_result = mysql_fetch_assoc($sql_result_local);


$last_table = $local_result['last_table_synced'];;

///

// remote

    $db_server = mysql_connect("localhost", "root","root");
if(!$db_server) die("Unable to connect to MySQL: " .mysql_error());
mysql_select_db("saajan_fedina")
 or die ("Unable to select database" .mysql_error());
print "Connection Succeeded";

    
  
    
     $time = date ("Y-m-d H:i:s"); 
    
    
    $query = "SHOW TABLES";
$sql_result = mysql_query($query);
if(!$sql_result) die ("//Database access failed: " .mysql_error());

$table = mysql_fetch_row($sql_result);



////

$table_current = "additional_exam_groups";
$flag = 0;

while ($table !== FALSE){

$table_current = $table[0];

if ($table_current == $last_table){

$flag = 1;
echo "yay1";

}


if ($flag !== 1){

echo "yay 2";
$table = mysql_fetch_row($sql_result);
continue;

}




$table_current = $table[0];

echo "<br><br>$table_current";


$custom_key = "id";


if ($table_current == "batch_students"){

$custom_key = "student_id";

} else if ($table_current == "faculty_posts"){

$custom_key = "post_id";

}  else if ($table_current == "privileges_users"){

$custom_key = "user_id";

}  else if ($table_current == "schema_migrations"){

$custom_key = "version";

}  else if ($table_current == "user_records"){

$custom_key = "fb_id";

}  else if ($table_current == "user_reports"){

$custom_key = "facebook_id";

} else if ($table_current == "sync_status"){

$table = mysql_fetch_row($sql_result);
continue ;

} else if ($table_current == ""){

$table = mysql_fetch_row($sql_result);
continue ;

}

////////////


$sync = new SyncronizeDB();
    //masterSet(dbserver,user,password,db,table,index)

//remote	
$sync->masterSet("localhost","root","root","saajan_fedina","$table_current", "$custom_key");
	//serverSet(dbserver,user,password,db,table,index)	
	$sync->slaveSet("saajanisfedina.db.10570337.hostedresource.com","saajanisfedina","iPhone1@1", "saajanisfedina","$table_current", "$custom_key");
	//syncronizing the slave table with the master table (at row level)
    
    
   
    
	$sync->slaveSyncronization();




////////////




update_last_sync_table ($table_current, $time);






///
$table = mysql_fetch_row($sql_result);

}//while end
    
    
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
 
    
    
    
        update_last_sync_table ("additional_exam_groups", $time)

    
	
	
?>
