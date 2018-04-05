<html>
<head>
<title>Fichero de prueba</title>
</head>
<body>
<h1>Fichero de prueba con vectores asociativos</h1>

<?php
$nombres= array("Lopez" => "Ana",
                "Garcia" => "Antonio",
                "Perez" => "Maria",
                "Honrubia" => "Jose",
                "Zamora" => "Juan");

$nombres["Cortes"]= "Rosa";
$nombres["Baix"]= "Jose Luis";
$nombres["Gomez"]= "Juan Antonio";
$nombres["Saez"]= "Jesus";
$nombres["Gimeno"]= "Carmen";
?>

<h3>Utilizando sólo la función each()</h3>

<table border="1">
<tr>
  <th>Apellido</th>
  <th>Nombre</th>
</tr>

<?php 
reset($nombres);
while($datos = each($nombres)) { 
?>
<tr>
  <td><?= $datos["key"] ?></td>
  <td><?= $datos["value"] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>