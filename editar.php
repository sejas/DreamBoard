<?php
function paginaeditar(){
	
if (isset($_POST['Actualizar'])){
$pagina=new Page($user, $_POST["titulo"]);
$pagina->actualizar_texto($_POST["text"]);

}




//mostramos los formularios de cambio de imagenes
	echo "<h1>Editar Paginas</h1>";
	$result=Config::sql("select * from db_pages where not deleted");
	if (!$result)
		echo mysql_error();
	while($pagina=mysql_fetch_assoc($result)) {
		$T[$pagina['id_page']]=new Page($user,$pagina['title']);
	}//end while

	foreach ($T as $pagina){
		echo '<form id="textos" action="" method="post" accept-charset="UTF-8">';
		echo '<h2><label for="texto">'.$pagina->title."</label>($pagina->level)</h2>"."";
		echo '<textarea style="width:500px;height:100px;" type="text" name="texto"">'.$pagina->text.'</textarea><br/>';
		echo '<input type="hidden" name="titulo" value="'.$pagina->title.'" />';
		echo '<input type="submit" value="Actualizar " />';
		echo '</form>';
	}//enf foreach
}
?>
