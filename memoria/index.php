<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
   <head>
      <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
      <meta name="Author" xml:lang="es" content="Antonio Sejas" />
      <meta name="Copyright" xml:lang="es" content="&copy; Antonio Sejas" />
      <meta name="Date" content="2012-01-30T22:35:41+02:00" />
      <meta name="Keywords" xml:lang="es" content="dreamboad, fi upm es,practica,antoniosejas" />
      <meta name="Keywords" xml:lang="en"
            content="" />
      <meta name="Description" xml:lang="es" content="Especificación técnica del proyecto DreamBoard, una aplicación con la que podrás visualizar tus proyectos o metas." />

      <title>DreamBoard: Visualiza y comparte tus objetivos</title>

      <link rel="StyleSheet" href="styles/style.css"
            media="screen" title="Default" />
      <link rel="StyleSheet" href="styles/print.css"
            media="print" title="Default - Printer" />
      <link rel="Alternate StyleSheet" href="styles/print.css"   title="Print" />
      <link rel="Alternate StyleSheet" href="styles/simple.css" title="Simple" />
   
   </head>

   <body>
      <div id="Header">

         <h1>
            <span id="Title">DreamBoard</span>
            <span id="Subtitle">Visualiza y comparte tus objetivos</span>
         </h1>
      </div>

      <div id="Menu">
         <div id="NavBar">
            <a href="?p=index_es">Descripción</a>
            <a href="?p=func_es">Funcionamiento</a>
            <a href="?p=install_es">Instalación</a>
	    <a href="?p=license_es">Licencia</a>
            <a href="?p=future_es">Futuras mejoras</a>
            <a href="?p=time_es">Tiempo empleado</a>
            <a href="?p=links_es">Enlaces</a>
            <a href="?p=downloads_es">Descargas</a>
            <a href="?p=author_es">Autor</a>
         </div>

         <div id="Updated">
            Última modificación: <br /><abbr title="30 de Enero de 2012" xml:lang="es">2012-01-30</abbr>
         </div>
	<div id="Lang">
		<p><a href="index_es" title="Idioma: Español">Español</a><a href="index_es" title="Idioma: Español"><img src="images/flag_es" alt="logoSpain"/></a></p>
	</div>
         <div id="Conformance">
            <!-- XHTML 1.1 -->
            <a href="http://validator.w3.org/check?uri=referer" hreflang="en"
                  title="Servicio de validación de XHTML del W3C">
               <img height="31" width="88"
                     src="images/valid-xhtml11"
                     alt="Icono de conformidad con XHTML 1.1" /></a>

            <!-- CSS 2.0 -->
            <a href="http://jigsaw.w3.org/css-validator/check/referer" hreflang="en"
                  title="Servicio de validación de CSS del W3C">
               <img height="31" width="88"
                     src="images/valid-css"
                     alt="Icono de conformidad con CSS" /></a>

            <!-- WCAG AA -->
            <a href="http://www.w3.org/WAI/WCAG1AA-Conformance"
                  title="Explicación del Nivel Doble-A de Conformidad">
               <img height="31" width="88"
                     src="images/wcag1AA"
                     alt="Icono de conformidad con el Nivel Doble-A, de las Directrices de Accesibilidad para el Contenido Web 1.0 del W3C-WAI" /></a>
         </div>
      </div>

<div id="Content">

<?php
/*
index_es">Descripción</a>
            <a href="?p=func_es">Funcionamiento</a>
            <a href="?p=install_es">Instalación</a>
            <a href="?p=license_es">Licencia</a>
            <a href="?p=future_es">Futuras mejoras</a>
            <a href="?p=time_es">Tiempo empleado</a>
            <a href="?p=links_es">Enlaces</a>
            <a href="?p=downloads_es">Descargas</a>
            <a href="?p=author_es">Autor</a>
*/
$paginas=array('index_es','func_es','install_es','license_es','future_es','time_es','links_es','downloads_es','author_es');
 if (in_array($_GET['p'],$paginas)){
	include($_GET['p'].'.php');	
 }else{
	include('index_es.php');
 }

?>
</div> 
      
<div id="Footer">
    <div id="LicenseIcon">
        <a href="http://www.gnu.org/copyleft/fdl.html" hreflang="en"
                     title="GNU Free Documentation License" xml:lang="en">
                  <img height="31" width="88"
                        src="images/gnu-fdl"
                        alt="Icono de la GNU Free Documentation License" /></a>
         </div>

<div id="Copyright">Copyright &copy; 2011-2012 <a href="mailto:antonio@sejas.es" title="Dirección de correo electrónico del autor" xml:lang="es"><span class="name" xml:lang="es"><span class="firstname">Antonio</span> <span class="surname">Sejas</span> <span class="surname">Mustafá</span></span></a>
</div>
<br />
<div id="LicenseNotice" xml:lang="en">Permission is granted to copy, distribute and/or modify this document under the terms of the GNU Free Documentation License, Version 1.2 or any later version published by the Free Software Foundation; with no Invariant Sections, no Front-Cover Texts, and no Back-Cover Texts. A copy of the license can be found <a href="http://www.gnu.org/licenses/fdl.txt" xml:lang="es" title="Página donde se encuentra la licencia de esta página web">here</a>.
</div>

</div>
   </body>
</html>
