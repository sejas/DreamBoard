<?php
class Page{ 
   	var $id;
   	var $title;
   	var $texto;
   	var $level;
	var $user;

function __construct($user,$title) {
	$this->user=$user;
	$this->level=-1;
	if(isset($title)){
		if($title=="logout"){
		session_start();
		Config::debug("destruyendo sesión");
		session_destroy();	
		header("location:http://antonio.sejas.es/proyectos/dreamboard/");
		die();
		}else if($title=="login"){
			if (isset($_POST["user"])){
				$this->user->login($_POST["user"],$_POST["pass"]);
				//comprobamos credenciales de usuario	
				header("location:http://antonio.sejas.es/proyectos/dreamboard/");
			}
		}//End if get p
		$ssql = "SELECT * FROM db_pages WHERE UPPER(title)='".strtoupper($title)."' and not deleted";
		$rs=Config::sql($ssql);
			
		if (mysql_num_rows($rs)==1){ 
			$rs=mysql_fetch_array($rs);
			$this->id=$rs['id'];
			$this->title=$rs['title'];
			$this->text=$rs['text'];
			$this->level=$rs['level'];
		}else{//paginas no encontradas
			$this->id=404;
			$this->title="P&aacute;gina no encontrada";
			$this->text="Lo siento la p&aacute;gina solicitada no ha sido encontrada";
		}
	}else{//Solicitan Index
		$this->get("1");//Get HOme
	}
}
function show_content (){
//muestra el texto del atributo text o si level==9 ejecuta su contenido
		if ($this->level==9){//pagina de administracion, ejecutamos su contenido
			echo "<div id=\"texto\">";
			eval($this->text);
			echo "</div>";
		}else{
			echo "<div id=\"texto\">";
			echo $this->text;
			echo "</div>";
		}
}
function load (){ 
	
	Config::debug( "comprobando ".$this->user->level.">=".$this->level."");
	if ($this->user->level>=$this->level){
		return true;	
	}else{
		die("ERROR 403 - "."<META HTTP-EQUIV=\"Refresh\" CONTENT=\"3; URL=?error=403\">");
	}	
} 

function show_menu(){
	if ($this->user->level==-1){
	 $ssql = "SELECT * FROM db_pages WHERE level='-1'";
	}else{
	 $ssql = "SELECT * FROM db_pages WHERE level<='".$this->user->level."' and level != '-1'";
	Config::debug($ssql);
	}
	$rs=Config::sql($ssql);
	if (!$rs){
		Config::debug (mysql_error());
	}else{
	while($subpagina=mysql_fetch_assoc($rs)) {
		$esta=($subpagina['id']==$this->id)?"actual":'';
		echo '<li><a class="'.$esta.'" href="'.$this->link($subpagina['title']).'">'.$subpagina['title'].'</a></li>';
	}//end while
}

}
//Recibe un titulo y devuelve un link
function link ($title){
return "?p=".strtr(strtolower($title),array(' '=>'-'));
}


function get($id){
        if( isset($id) ){
                $ssql = "SELECT * FROM db_pages WHERE id_page='$id' and not deleted";
                $rs=Config::sql($ssql);
                if ($rs){
			$rs=mysql_fetch_array($rs);
                        $this->id=$rs["id"];
                        $this->level=$rs["level"];
                        $this->title=$rs["title"];
                        $this->texto=$rs["texto"];
                }
                mysql_free_result($rs);
                return true;
       }
}
function actualizar_texto($texto){
$ssql="update db_pages set text='".strtr($texto,array("'"=>'"'))." where id_page=$this->id";
                $rs=Config::sql($ssql);
                if (!$rs){
			Config::debug(mysql_error());
		}	

}


}
/**
*id_page	int(11)			No	Ninguna	AUTO_INCREMENT	  Cambiar	  Eliminar	 Más 
	 2	title	varchar(255)	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 3	text	text	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 4	level	int(11)			No	Ninguna		  Cambiar	  Eliminar	 Más 
	 5	deleted	tinyint(1)			No	Ninguna		  Cambiar	  Eliminar	 Más 
*/
?>
