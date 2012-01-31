<!doctype html>  
<?php include_once("config.php"); ?>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<title>Dream Board</title>
<link rel="icon" href="images/favicon.gif" type="image/x-icon"/>
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<link rel="shortcut icon" href="http://sejas.es/favicon.ico" type="image/x-icon"/> 
<link rel="stylesheet" type="text/css" href="css/styles.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    </head>
    <body>
<div id="main">
		<?php
			if (!isset($_GET['d'])){
				$id=2;	
			}else{
				$id=Crypto::decrypt($_GET['d']);
			}
			$ssql = "SELECT * FROM db_boards WHERE id_board = '".$id."'";
        		$rs=Config::sql($ssql);
        		if (!$rs){
                	 echo "<h1> DreamBoard No encontrado";//	echo mysql_error();
        		}else{
        			$dB=mysql_fetch_assoc($rs);
				$dreamboard = new DreamBoard($dB);
			}
			echo count($dreamboard->images);
		?>
			<?php foreach($dreamboard->images as $imagen){ ?>

		        <div class="image first"> 
				<h1><?php echo $imagen->title; ?></h1>
				<img height="120" src="<?php echo $imagen->url; ?>" />
				<span class="descripcion">Febrero 2012</span>
			</div>

			<?php } ?>
			<!--div class="link email">
			</div!-->
				<div class="link twitter first">
				<a href="http://twitter.com/antoniosejas" title="Sígueme en Twitter – @antoniosejas" target="_blank" >
					<em>Sígueme</em>
					<span>Twitter</span>
				</a>
			</div>	
</div>

		<script language="JavaScript" type="text/javascript">
		document.getElementById('main').style.visibility = 'hidden';
		</script>
		<div id="canvas">
		</div>
		<script type="text/javascript" src="js/protoclass.js"></script>
		<script type="text/javascript" src='js/box2d.js'></script>
		<script type="text/javascript" src='js/main.js'></script>	

</body>
</html>
