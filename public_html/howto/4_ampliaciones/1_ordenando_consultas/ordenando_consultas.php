<?php
// Desactivar toda notificaci�n de error
error_reporting(0);
// Recogemos el valor de la variable "ordenar"
$ordenar = $_GET['ordenar'];

?>
<html>
<head></head>
<body>
<h3>Ordenando consultas</h3>
<!-- Script que recoge los valores de la variables ordenar -->
<script>
// Funci�n de detecci�n del m�todo de ordenado
function doChange() {
	var_campo_ordenar = 
		document.consultar.ordenar.options
		[document.consultar.ordenar.selectedIndex].value; 	// alert("Ordenar = "+var_campo_ordenar);
	window.location = "ordenando_consultas.php?ordenar="+var_campo_ordenar;
}
</script>


<form name="consultar" action="index.php"> 
Ordenar por
<select name="ordenar" onChange="JavaScript:doChange()">
<option value="nombre"<?php if($odenar=='nombre')echo("selected");?>>Nombre</option>
<option value="apellidos"<?php if($ordenar=='apellidos')echo("selected");?>>Apellidos</option>
<option value="telefono"<?php if($ordenar=='telefono')echo("selected");?>>Tel�fono</option>
</select>
</form>
<?php
	// Conectamos con la base de datos 
  $link = mysqli_connect("localhost","root","root");
  // Seleccionamos la base de datos
  $db = mysqli_select_db($link, "agenda");

	// Consulta de los datos en el orden especificado por la variable $ordenar
	$sql = "SELECT * FROM contactos ORDER BY $ordenar";
	// Montamos y lanzamos la consulta
	$result = mysqli_query($link, $sql);
	// Mostramos los resultados ordenados
	if($result){
  	while($row = mysqli_fetch_object($result)){
  	  echo("<br>$row->nombre $row->apellidos $row->telefono");
  	}
  	// Liberamos recursos
  	mysqli_free_result($result);
	}	
	// Cierre de la conexi�n con MySQL
	if($link) mysqli_close($link);
?>
<hr>
</body>
</html>