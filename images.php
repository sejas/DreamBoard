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
}
?>
