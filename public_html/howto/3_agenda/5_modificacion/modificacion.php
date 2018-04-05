<html>
<head></head>
<body>
<h3>Modificaci�n de datos</h3>
<script>
// Funci�n de detecci�n del id seleccionado
function changeSelect(){
var_id = document.modificar.id.options[document.modificar.id.selectedIndex].value;
window.location = "modificacion.php?id_modificar="+var_id;
}
</script>
<form name="modificar" action="modificacion_s.php" method="post">
Contacto a modificar:
<select name="id" onchange="changeSelect()">
<option value="0">- Ninguno -</option>
<?php
   // Desactivar toda notificaci�n de error
   error_reporting(0);

	// Conectamos con la base de datos 
  $link = mysqli_connect("localhost","root","root");
  // Seleccionamos la base de datos
  $db = mysqli_select_db($link, "agenda");
	// Montamos y lanzamos la consulta
	$sql = "SELECT id, nombre, apellidos FROM contactos";
	$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_object($result)){
	  echo("<option value=$row->id>$row->nombre $row->apellidos</option>");
	}
	if($result) mysqli_free_result($result);
	if($link) mysqli_close($link);
?>
</select><br>
<?php
	// Conectamos con la base de datos 
  $link = mysqli_connect("localhost","root","root");
  // Seleccionamos la base de datos
  $db = mysqli_select_db($link, "agenda");
	// Recogida del id seleccionado
	$id_modificar = $_GET['id_modificar'];
	// Consulta de los datos del id seleccionado (para ponerlos en el formulario)
	$sql = "SELECT * FROM contactos WHERE id = $id_modificar";
	// Montamos y lanzamos la consulta
	$result = mysqli_query($link, $sql);
	// Recogemos el registro resultado para rellenar el formulario
	if($result)$row = mysqli_fetch_object($result);
	else $row=NULL;
?>
<input type="hidden" name="id_modificar" value="<?php echo($id_modificar);?>"/>
Nombre: <input type="text" name="nombre" value="<?php echo($row->nombre);?>"/><br>
Apellidos: <input type="text" name="apellidos" value="<?php echo($row->apellidos);?>"/><br>
Telefono: <input type="text" name="telefono" value="<?php echo($row->telefono);?>"/><br>
Fecha nacimiento: <input type="text" name="nacimiento" value="<?php echo($row->nacimiento);?>"/><br>
<?php
	if($result) mysqli_free_result($result);
	if($link) mysqli_close($link);
?>
<input type="submit" name="DB_Modificar" value="Modificar"/><br>
<input type="checkbox" name="debug"/>Mostrar progreso
</form>
<hr>
</body>
</html>