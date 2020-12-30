<?php 
//if(!isset($_SESSION)){ session_start();}
//database credentials
// define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'bloodBank/');
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','bloodbank1');

$DB = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn = new mysqli('localhost', 'root','','bloodbank1');


 ?>