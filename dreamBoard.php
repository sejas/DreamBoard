<?php
class DreamBoard{ 
var $id;
var $description;
var $title;
var $images;
//recibe un array
function __construct($dB) {
	$this->id=$dB['id_board'];
	$this->description=$dB['description'];
	$this->title=$dB['title'];
	$this->getImages();
}

function getImages(){
$ssql = "SELECT * FROM db_pictures WHERE id_board='".$this->id."'";
	Config::debug($ssql);
        $rs=Config::sql($ssql);
        if (!$rs){
                echo mysql_error();
        }else{
	$i=0;
        while($dB=mysql_fetch_assoc($rs)) {
		$this->images[$i]=new Image($dB);
	$i++;
        }//end while

	Config::debug("cuantas".count($this->images));

return $this->images;
}
}

public static function showTable($user_id){
$table='<table><tbody>
<tr class="bg"><td>Title</td> <td>Descripcion</td><td>Borrar</td> </tr>';
        $result=Config::sql("SELECT * FROM db_boards where not deleted and id_user='".$user_id."'");
        if (!$result){
                        return "<p class='msg error'>Ups! ha habido un error/p>";
        }
                while($row=mysql_fetch_assoc($result)) {
			$tablew.="<tr> <td>".$row['title']."</td> <td>".$row['description']."</td>"."<td class=\"msg done\"><a href=\"?p=".$_GET['p']."&quitar=".$row['id_board']."\">&nbsp;.</a></td>\n";
                }//end while
		
                $table3=$table.$tablew.'</tbody></table>
                        <h2>Añadir Nuevo DreamBoard</h2>
                        <form id="secciones" action="" method="post" >
                                <input type="text" name="title" placeholder="T&iacute;tulo del DreamBoard" />
                                <input type="text" name="description" placeholder="Descripci&oacute;n del DreamBoard" />
                                <input type="submit"  name="nuevoDreamBoard" value="Añadir" />
                        </form>';


return $table3;
}

function save($user_id){
$ssql="INSERT INTO `db_boards` (`id_board`, `id_user`, `title`, `description`, `created`, `modified`, `deleted`) VALUES ('$this->id', '$user_id', '$this->title', '$this->description', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', '0');";
        $result=Config::sql($ssql);
        if (!$result){
                        return "<p class='msg error'>Ups! ha habido un error/p>";
        }else{
			
	}
}

public static function delete($user_id, $board_id){
$ssql="UPDATE db_boards set deleted=1 where id_user='$user_id' and id_board='$board_id'";
if(Config::sql($ssql)){
	return "<p class\"exito\">DreamBoard borrado correctamente</p>";
}else{
		return "<p class='msg error'>Ups! ha habido un error/p>";
}

}



}
?>
