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
}
?>
