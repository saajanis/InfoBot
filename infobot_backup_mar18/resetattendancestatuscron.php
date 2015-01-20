<?php





require_once 'dbconfigfb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) {throw new Exception("Database connection failed");}
if (! mysql_select_db($db_database)) {throw new Exception("Database doesn't exist - $db_database");}



$query = "UPDATE user_records SET attendance_notified = '0' ";
    $sql_result = mysql_query($query);
    if(!$sql_result) die ("//Database access failed: " .mysql_error());







?>