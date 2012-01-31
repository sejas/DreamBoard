<?php
include('config.php');
//Si la sesion esta abierta, recoge al usuario. Sino lo inicializa a invitado
$user=new User();
//Recoge la pagina de $_GET['p'], sino la inicializa a HOME
$page=new Page($user,$_GET['p']);
//Comprueba que el usuario tiene permisos para ver esa pagina
$page->load();

?>
<!doctype html>  
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<title><?php echo $page->title; ?></title>
<link rel="icon" href="images/favicon.gif" type="image/x-icon"/>
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<link rel="shortcut icon" href="http://sejas.es/favicon.ico" type="image/x-icon"/> 
<link rel="stylesheet" type="text/css" href="css/styles.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="js/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'images/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>
    </head>
    <body>
<div id="container-wrap">
    <!--start container-->
    <div id="container">
    <!--start header-->
    <header>
    <!--start logo-->
    <a href="#" id="logo"><h1>DreamBoard</h1></a>
	<!--end logo-->
	<div> Logueado como <?php echo "<b>$user->user</b>"; if ($user->id!=-1) echo " (<a href=\"?p=logout\">Logout</a>)"; ?> 
   <!--start menu-->
	<nav>
    <ul>
	<?php $page->show_menu(); ?>
    </ul>
    </nav>
	<!--end menu-->
	

    <!--end header-->
	</header>

<!--start intro-->
 <!--section id="intro">
   <div id="slides">
   <div class="slides_container">
   <img src="images/banner1.png" width="960" height="300" alt="baner">
   <img src="images/banner1.png" width="960" height="300" alt="baner">
   <img src="images/banner1.png" width="960" height="300" alt="baner">

   </div>
   </div>
 
   </section!-->
   <!--end intro-->
   </div>
   <!--end container-->
 </div>
   <!--end 980-->

