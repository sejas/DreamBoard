<?php
class Image{ 
var $id;
var $dreamBoard;
var $url;
var $title;
var $description;
var $x;
var $y;
function __construct($img) {
	$this->id=$img['id_image'];
	$this->dreamBoard=$img['dreamBoard'];
	$this->url=$img['url'];
	$this->title=$img['title'];
	$this->description=$img['description'];
	$this->x=$img['x'];
	$this->y=$img['y'];
}

public static function showTable($board_id){
$table='<table><tbody>
<tr class="bg"><td>Title</td> <td>URL</td><td>Borrar</td> </tr>';
        $result=Config::sql("SELECT * FROM db_pictures where not deleted and id_board='".$board_id."'");
        if (!$result){
                        return "<p class='msg error'>Ups! ha habido un error/p>";
        }
                while($row=mysql_fetch_assoc($result)) {
			$tablew.="<tr> <td>".$row['title']."</td> <td>".$row['url']."</td>"."<td class=\"msg done\"><a href=\"?p=".$_GET['p']."&quitar=".$row['id_picture']."\">&nbsp;.</a></td>\n";
                }//end while
		
                $table3=$table.$tablew.'</tbody></table>
                        <h2>Añadir Nueva Imagen</h2>
                        <form id="secciones" action="" method="post" >
                                <input type="text" name="title" placeholder="T&iacute;tulo del Imagen" />
                                <input type="text" name="url" placeholder="url de la Imagen" />
				<input type="hidden" name="board_id" value="'.$board_id.'" />
                                <input type="submit"  name="nuevaImagen" value="Añadir" />
                        </form>';


return $table3;
}

function save($board_id){
$ssql="INSERT INTO `db_pictures` (`id_picture`, `id_board`, `url`, `title`, `description`, `x`, `y`, `created`, `deleted`) VALUES (NULL, '$board_id', '$this->url', '$this->title', '$this->description', '$this->x', '$this->y', CURRENT_TIMESTAMP, '0');";
        $result=Config::sql($ssql);
        if (!$result){
                        return "<p class='msg error'>Ups! ha habido un error/p>";
        }else{

        }
}


public static function delete($image_id){
$ssql="UPDATE db_pictures set deleted=1 where id_picture='$image_id'";
if(Config::sql($ssql)){
        return "<p class\"exito\">Imagen borrada correctamente</p>";
}else{
                return "<p class='msg error'>Ups! ha habido un error/p>";
}

}

}
?>
