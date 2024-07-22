<?php
error_reporting(0);

$inactive = 5000; 
ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours
session_start();

if (isset($_SESSION['startsession']) && (time() - $_SESSION['startsession'] > $inactive)) {
   session_destroy();   // destroy session data
   header('Location: index.php');
}
include_once   "ez_sql_core.php";
include_once   "ez_sql_mysqli.php";
ini_set('memory_limit','128M');
ini_set('max_execution_time','1000');
// at the same time - db_user / db_password / db_name / db_host

 $db = new ezSQL_mysqli('u803997168_raru','B;EX[O7UpF:5','u803997168_raru','localhost');
//$db = new ezSQL_mysqli('root','','raru_db','localhost');

if(!$db){ die('Could not connect: ' . mysql_error());}
// define("SITE_PATH","https://rarucapital.com/raru-final-2/");
 define("SITE_PATH","https://rarucapital.com/");

$sitepath = SITE_PATH;
// define("SITE_PATH_ADMIN","https://rarucapital.com/raru-final-2/raru_admin");
 define("SITE_PATH_ADMIN","https://rarucapital.com/raru_admin");

$sitepath_admin = SITE_PATH_ADMIN;
define("SITE_NAME","RARU CAPITAL IFSC PRIVATE LIMITED");
$sitename = SITE_NAME;
$pageName = basename($_SERVER['PHP_SELF']);
mysqli_set_charset("UTF8");
?>
<?php include('function.php'); ?>