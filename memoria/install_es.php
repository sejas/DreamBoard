<?php
//Si nos llaman directamente morimos
if (!isset($paginas)) die();
?>
<h2>Instalación</h2>
<p>En la sección de descargas o en mi repositorio de GitHub, podrás descargar los fuentes PHP y las tablas SQL vacías.</p>
<p>Desempaqueta el código fuente en una carpeta de tu servidor web, modifica el archivo config.php con los datos de tu base de datos y ejecuta el archivo tablas.sql sobre tu base de datos</p>

<p>Ejemplo:</p>
<pre>
   $user="user_db";
   $pass="pass_db";
   $server="localhost";
   $database="database_name";
</pre>

