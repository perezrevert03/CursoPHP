<html>
<head></head>
<body>
<!-- Inserci�n de datos -->
<h3>Inserci�n de datos</h3>
<form action="insercion_s.php" method="post">
Nombre: <input type="text" name="nombre" value=""/><br>
Apellidos: <input type="text" name="apellidos" value=""/><br>
Telefono: <input type="text" name="telefono" value=""><br>
<?php
// Desactivar toda notificaci�n de error
error_reporting(0);
 $fecha=$_GET['ano']."-".$_GET['mes']."-".$_GET['dia']?> 
Fecha Nacimiento: <input type="text" name="fecha" value="<?php echo($fecha);?>"/><br>
<input type="submit" name="DB_Insertar" value="Insertar"/><br>
<input type="checkbox" name="debug"/>Mostrar progreso
</form>
<form  name="insertar">
Fecha de nacimiento:<br>
<?php include("calendario.php");?>
</form>
<hr>
</body>
</html>