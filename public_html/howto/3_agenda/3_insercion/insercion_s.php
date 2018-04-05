<?php
	// Desactivar toda notificaci�n de error
	error_reporting(0);
	echo("<br><h3>Consulta sencilla de la base de datos</h3>");
	  // Recogemos la variable de monitorizaci�n
	  $debug = $_POST['debug'];
		
 	// Conectamos con MySQL
 	$link = mysqli_connect("localhost","root","root");
	  if(!$link) die("<br>Error: En la conexi�n con MySQL: ".mysqli_error());
	  else if($debug) echo("<br>OK: Conexi�n correcta con MySQL");

	// Seleccionamos la base de datos "agenda"
	$db = mysqli_select_db($link, 'agenda');
	if(!$db) die("<br>Error: En la selecci�n de la base de datos: ".mysqli_error());
	else if($debug) echo("<br>OK: Selecci�n correcta de la base de datos");

	// Recogemos las variables
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$nacimiento = $_POST['fecha'];
	
	// Montamos la consulta
	$sql = "INSERT INTO contactos".
		" values (NULL, '$nombre', '$apellidos', '$telefono', '$fecha')";
	// Lanzamos la consulta
	$result = mysqli_query($link, $sql);
	
	// Comprobamos el resultado
	if(!$result) die("ERROR: En la inserci�n: ".mysqli_error());
	else if($debug) echo("<br>OK: Inserci�n correcta de la base de datos");
	
	// Cerramos la conexi�n
	if(!mysqli_close($link)) die ("Error en el cierre de la base de datos: ".mysqli_error());
	else if($debug) echo("<br>OK: Cerrada la base de datos correctamente");	
?>
