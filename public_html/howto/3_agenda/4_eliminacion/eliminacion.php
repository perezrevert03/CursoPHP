<html>
<head></head>
<body>
<!-- Eliminaci�n de datos -->
<h3>Eliminaci�n de datos</h3>
<form action="eliminacion_s.php" method="post">
Contacto a eliminar: 
<select name="id">
<option value="0">- Ninguno -</option>
<?php
	// Desactivar toda notificaci�n de error
	error_reporting(0);
	// Conectamos con la base de datos 
  $link = mysqli_connect("localhost","root","root");
  // Seleccionamos la base de datos
  $db = mysqli_select_db($link, "agenda");
	// Montamos la consulta
	$sql = "SELECT id, nombre, apellidos FROM contactos";
	$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_object($result)){
	  echo("<option value=\"$row->id\">$row->nombre $row->apellidos</option>");
	}
	if($result) mysqli_free_result($result);
	if($link) mysqli_close($link);
?>
</select><br>
<input type="submit" name="DB_Eliminar" value="Eliminar"/><br>
<input type="checkbox" name="debug"/>Mostrar progreso
</form>
<hr>
</body>
</html>