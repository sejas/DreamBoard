<?php 
class Picture{ 
   	var $id; 
   	var $id_board;
   	var $url;
   	var $title; 
   	var $x; 
   	var $y; 

function open(){ 
$this->link=mysql_connect($this->server,$this->user, $this->pass); 
mysql_select_db('antoniosejases'); 
} 

function close(){ 
mysql_close();
} 
} 
/*
*	 1	id_picture	bigint(20)			No	Ninguna	AUTO_INCREMENT	  Cambiar	  Eliminar	 Más 
	 2	id_board	bigint(20)			No	Ninguna		  Cambiar	  Eliminar	 Más 
	 3	url	varchar(255)	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 4	title	varchar(255)	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 5	description	text	utf8_bin		No	Ninguna		  Cambiar	  Eliminar	 Más 
	 6	x	float			No	Ninguna		  Cambiar	  Eliminar	 Más 
	 7	y	float			No	Ninguna		  Cambiar	  Eliminar	 Más 
	 8	created	timestamp		on update CURRENT_TIMESTAMP	No	CURRENT_TIMESTAMP		  Cambiar	  Eliminar	 Más 
	 9	deleted	tinyint(1)			No	Ninguna		  Cambiar	  Eliminar	 Más 
*/
?>
