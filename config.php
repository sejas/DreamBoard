<?php 
include_once('user.php');
include_once('crypto.php');
include_once('picture.php');
include_once('page.php');
include_once('sidebar.php');
class Config{ 

function __construct() {
}
public static function open(){ 
			//print_r($_SESSION);
//Configuracion del servidor MySql
   $user=""; 
   $pass="";
   $server=""; 
   $database="";
//Fin configuracion del servidor MySql
mysql_connect($server,$user, $pass); 
mysql_select_db($database); 
} 
public static function sql($ssql){
Config::debug("SQL: ".$ssql);
Config::open();
$rs=mysql_query($ssql);
Config::debug("Resultados: ".mysql_num_rows($rs));
return $rs;
}

public static function close(){ 
//session_write_close();
mysql_close();
} 

public static function debug($string){
$debug=0;
	if ($debug)
		echo $string."<br />\n";
}

} 
?>
