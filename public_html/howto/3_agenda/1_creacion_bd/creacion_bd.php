<?php
// Desactivar toda notificaci�n de error
error_reporting(0);
echo("<br><h3>Creación e inicio de la base de datos</h3>");

  // Recogemos el root y el password
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	
	// Comprobamos si se nos ha pasado un usuario 
	if(!empty($usuario)){
    // Recogemos la variable de monitorizaci�n
  	$debug = $_POST['debug'];
  	// Conectamos con MySQL
  	$link = mysqli_connect("localhost", "$usuario", "$clave");
  	if(!$link) die("<br>Error: En la conexi�n con MySQL: ".mysqli_error());
  	else if($debug) echo("<br>OK: Conexi�n correcta con MySQL");

  	// Borramos la base de datos
  	$sql = "DROP DATABASE agenda";
  	$result = mysqli_query($link, $sql);

  	// Creamos la base de datos
  	$sql = "CREATE DATABASE agenda";
  	$result = mysqli_query($link, $sql);
  	if(!$result) die ("<br>Error: En la creaci�n de la base de datos: ".mysqli_error());
  	else if($debug) echo("<br>OK: Creaci�n correcta de la base de datos");

  	// Seleccionamos la base de datos
  	$db = mysqli_select_db($link, 'agenda');
  	if(!$db) die ("<br>Error: En la slecci�n de la base de datos: ".mysqli_error());
  	else if($debug) echo("<br>OK: Selecci�n correcta de la base de datos");

   	// Creamos la tabla de contactos
  	//$sql = "CREATE TABLE contactos ('id INT', 'nombre VARCHAR' , 'apellidos VARCHAR', 'telefono VARCHAR', 'nacimiento DATE')";
    $sql = "CREATE TABLE contactos (";
    $sql .= "id INT NOT NULL AUTO_INCREMENT, ";
    $sql .= "nombre CHAR(50), ";
    $sql .= "apellidos CHAR(100), ";
    $sql .= "telefono CHAR(15), ";
    $sql .= "nacimiento DATE, ";
    $sql .= "KEY (id) ) ";
	$result = mysqli_query($link, $sql);
  	if(!$result) die ("<br>Error: En la creaci�n de la tabla 'contactos': ".mysqli_error());
  	else if($debug) echo("<br>OK: Creaci�n correcta de la 'contactos'");

  	// Insertamos un nombre
  	$sql = "INSERT INTO contactos".
			" values (NULL, 'Carles', 'Perez Revert', '666', '1996-03-23')";
  	$result = mysqli_query($link, $sql);
  	if(!$result) die ("<br>Error: En la inserci�n del contacto ejemplo: ".mysqli_error());
  	else if($debug) echo("<br>OK: En la inserci�n del contacto ejemplo");

  	// Insertamos varios nombres en una sola consulta
  	$sql = "INSERT INTO contactos".
        " values (NULL,'Juan','Juan Juan','000','2000-01-01'),".
		" (NULL, 'Maria', 'Garcia Garcia','111', '1999-02-24')";
  	$result = mysqli_query($link, $sql);
  	if(!$result) die ("<br>Error: En la inserci�n de los contactos ejemplo: ".mysqli_error());
  	else if($debug) echo("<br>OK: En la inserci�n de los contactos ejemplo");
	}
	else{
	  echo("Error: Campo de root vac�o<br>");
	}
	
// Cerramos la conexi�n
  if(!mysqli_close($link))
  	die ("Error en el cierre de la base de datos: ".mysqli_error());
  else if($debug)
  	echo("<br>OK: Cerrada la base de datos correctamente");
?>
