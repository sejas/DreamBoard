<?php
class Page{ 
   	var $id;
   	var $title;
   	var $texto;
   	var $level;
	var $user;
	var $precontent;

function __construct($user,$title) {
	$this->user=$user;
	$this->level=-1;
	if($title!=""){
		if($title=="home"){
		$this->precontent='<iframe width="800" height="600" src="board.php?d='.$_GET['m'].'" > </iframe>';
		}else if($title=="logout"){
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
		}else if($title=="register"){
			if(isset($_POST["email"])){
				$ssql="INSERT INTO `db_users` (`id_users`, `user`, `password`, `email`, `description`, `register`, `modified`, `level`, `deleted`) VALUES ('".md5($_POST["email"])."', '".$_POST["usario"]."', '".md5($_POST["password"])."', '".$_POST["email"]."', '', CURRENT_TIMESTAMP, NOW(), '1', '0');";
				$rs=Config::sql($ssql);
				if($rs){
				 	mail($_POST["email"],"asunto", "Se ha registrado correctamente en http://antonio.sejas.es/proyectos/dreamboard/ su nombre de usuario es ".$_POST['usuario']);
					echo "<h3 id='exit'>Usuario registrado correctamente, revise su email</h3>";
					echo "<meta http-equiv=\"Refresh\" content=\"3;URL=?p=login\">";
				}else{
					echo "<h3 id='error'>Lo siento parece que el usuario ya existe</h3>";
				}
			}
		}else if($title=="add boards"){
			     if(isset($_POST["title"])){
				$dreamboard= new DreamBoard(array("id"=>"NULL","title"=>$_POST["title"],"description"=>$_POST['description']));
				$this->precontent=$dreamboard->save($this->user->id).$this->precontent;
                              }
				if(isset($_GET['quitar'])){
					$this->precontent.=DreamBoard::delete($this->user->id,$_GET['quitar']);
				}
			$this->precontent=DreamBoard::showTable($this->user->id);	
		}else if($title=="add images"){
			     if(isset($_POST["title"])){
				$image= new Image(array("id_image"=>"NULL","dreamboard"=>"","url"=>$_POST["url"],"title"=>$_POST["title"],"description"=>$_POST['description'],"x"=>"","y"=>""));
				$this->precontent=$image->save($_POST["board_id"]).$this->precontent;
                              }
				if(isset($_GET['quitar'])){
					$this->precontent.=Image::delete($_GET['quitar']);
				}
			$dreamboards=$this->user->dreamboards();
			foreach ($dreamboards as $dreamb){
				$this->precontent.="<h2>$dreamb->title</h2>";
				$this->precontent.=Image::showTable($dreamb->id);	
			}
	
		}//End if get p

		$ssql = "SELECT * FROM db_pages WHERE UPPER(title)='".strtoupper($title)."' and not deleted";
		$rs=Config::sql($ssql);
			
		if (mysql_num_rows($rs)==1){ 
			$rs=mysql_fetch_array($rs);
			$this->id=$rs['id_page'];
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
		echo "<div id=\"texto\">";
		echo $this->precontent;
		echo "</div>";
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
		$esta=($subpagina['id_page']==$this->id)?"actual":'';
		echo '<li><a class="'.$esta.'" href="'.$this->link($subpagina['title']).'">'.$subpagina['title'].'</a></li>';
	}//end while
}

}
//Recibe un titulo y devuelve un link
function link ($title){
return "?p=".strtr(strtolower($title),array(' '=>' '));
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
                        $this->text=$rs["text"];
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
