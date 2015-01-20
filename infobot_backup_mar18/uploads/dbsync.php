
/**
 * This script enables you to copy the structure and content of databases back and
 * forth between remote and local databases. Remote databases are accessed through 
 * SSH tunnels.
 * 
 * This script operates in two modes. The mode is passed in the first parameter
 * -- put: Copy a local database to a remote server
 * -- get: Copy a remote database to a local server
 * 
 * When using a config.ini file to specify your database credentials the format is:
 * 
 * [remote]
 * ssh      = user@server.com
 * username = remoteDbUsername
 * password = remoteDbPassword
 * database = remoteDbName
 * 
 * [local]
 * username = localDbUsername
 * password = localDbPassword
 * database = localDbName
 * 
 * 
 * Example usage: Replace your local database with a remote database
 * dbsync.php get
 * 
 * Example usage: Replace a remote database with your local database
 * dbsync.php put
 * 
 * Example usage using extrenal config file: Replace a remote database with your local database
 * dbsync.php put path/to/config.ini
 */
 
/**
 * If you have your .ssh/config file setup you can use this syntax
 *  $sshServer = 'server';
 * If you are not using your .ssh/config file you should use this syntax
 *  $sshServer = 'user@server.com
 
// SSH server connection string
$sshServer = 'user@host.com';

// Remote database configuration
$rDbUser = 'remoteDbUsername';
$rDbPass = 'remoteDbPassword';
$rDbName = 'remoteDbName';

// Local database configuration
$lDbUser = 'localDbUsername';
$lDbPass = 'localDbPassword';
$lDbName = 'localDbName';
*/

/** End of configuration settings. Do not edit below this line **/

$mode = $argv[1];

if(isset($argv[2])) {
  $config = $argv[2];
  if(file_exists($config)) {
    $ini = parse_ini_file($config, true);
    $sshServer = $ini['remote']['ssh'];
    $rDbUser = $ini['remote']['username'];
    $rDbPass = $ini['remote']['password'];
    $rDbName = $ini['remote']['database'];
    $lDbUser = $ini['local']['username'];
    $lDbPass = $ini['local']['password'];
    $lDbName = $ini['local']['database'];
  } 
}

if($mode == 'get') {
  $source = "ssh $sshServer" . ' "' . "mysqldump -u $rDbUser --password=$rDbPass $rDbName" . '" ';
  $target = "mysql -u $lDbUser --password=$lDbPass --host=localhost -C $lDbName";
  $cmd = " $source | $target";
  echo "Replacing $lDbName on localhost with $rDbName from $sshServer\n\n";
  echo `$cmd`;
}
elseif($mode == 'put') {
  $source = "mysqldump -u $lDbUser --password=$lDbPass --host=localhost -C $lDbName";
  $target = "ssh $sshServer" . ' "' . "mysql -u $rDbUser --password=$rDbPass $rDbName" . '"';
  $cmd = $source . ' | ' . $target;
  echo "Replacing $rDbName on $sshServer with $lDbName on localhost\n\n";
  echo `$cmd`;
}
echo "\n\nTransfer complete.\n\n";