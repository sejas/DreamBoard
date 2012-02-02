<?php 
class User{ 
   	var $id; 
   	var $user; 
   	var $email;
	var $ip;

function __construct() {
session_start();
//PRUEBAS
//$_SESSION['level']=9; 
//$_SESSION['id']=1; 
//FIN PRUEBAS
	//Config::debug("
	if (isset($_SESSION['level']) && isset($_SESSION['id'])){
	Config::debug("Recuperando usuario con id=".$_SESSION['id']);
		$this->get($_SESSION['id']);
	}else{
		$this->id=-1;
		$this->level=-1;
		$this->user="invitado";
		$this->ip=$_SERVER['REMOTE_ADDR'];
	}
Config::debug('$this->user:'.$this->user." - ".'$_SESSION[\'id\']:'.$_SESSION['id']);
}

function isValid(){ 

} 

function login($usuario,$password){
// return boolean
		$ssql = "SELECT * FROM db_users WHERE user='$usuario' and password=md5('$password') and not deleted"; 
		$rs=Config::sql($ssql);
		if (mysql_num_rows($rs)==1){ 
			$rs=mysql_fetch_array($rs);
			Config::debug("Logueando correctamente a ".$rs["user"]." con permisos ".$rs['level']);
			session_start();
			$_SESSION["level"]= $rs["level"];
			$_SESSION["id"]= $rs["id_users"];
			$_SESSION["user"]= $rs["user"];
			session_write_close();
			$this->user=$rs["user"];
			$this->email=$rs["email"];
			$this->id=$rs["id_users"];
			$this->level=$rs["level"];
			$this->ip=$_SERVER["REMOTE_ADDR"];
			mysql_free_result($rs); 
			return true;
		} 

}
function get($id){ 
	if( isset($id) ){
		$ssql = "SELECT * FROM db_users WHERE id_users='$id'"; 
		$rs=Config::sql($ssql);
		if (mysql_num_rows($rs)==1){ 
			$rs=mysql_fetch_assoc($rs);	
 			$_SESSION["level"]= $rs["level"];
                        $_SESSION["id"]= $rs["id_users"];
                        $_SESSION["user"]= $rs["user"];
                        session_write_close();
                        $this->user=$rs["user"];
                        $this->email=$rs["email"];
                        $this->id=$rs["id_users"];
                        $this->level=$rs["level"];
                        $this->ip=$_SERVER["REMOTE_ADDR"];
			mysql_free_result($rs); 
		return true;
		} 
       } 
}


function dreamBoards(){

      $ssql = "SELECT * FROM db_boards WHERE id_user='".$this->id."' and not deleted";
        $rs=Config::sql($ssql);
        if (!$rs){
                echo mysql_error();
        }else{
        $i=0;
        while($dB=mysql_fetch_assoc($rs)) {
		$d[$i]=new DreamBoard($dB);
	$i++;
        }//end while
	return $d;
	}
}

function save($dreamboard_id){
$ssql="INSERT INTO `db_boards` (`id_board`, `id_user`, `title`, `description`, `created`, `modified`, `deleted`) VALUES ('$this->id', '$user_id', '$this->title', '$this->description', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', '0');";
        $result=Config::sql($ssql);
        if (!$result){
                        return "<p class='msg error'>Ups! ha habido un error/p>";
        }else{

        }
}


}
/**
*#	Columna	Tipo	Cotejamiento	Atributos	Nulo	Predeterminado	Extra	Acción
	 1	id_users	varchar(32)	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 2	user	varchar(100)	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 3	password	varchar(32)	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 4	email	varchar(255)	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 5	description	text	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 6	register	timestamp			No	CURRENT_TIMESTAMP		  Cambiar	  Eliminar	 Más 
	 7	modified	timestamp			Sí	NULL		  Cambiar	  Eliminar	 Más 
	 8	level	int(1)			No	Ninguna		  Cambiar	  Eliminar	 Más 
	 9	deleted	tinyint(1)			No	Ninguna
**/

?>
