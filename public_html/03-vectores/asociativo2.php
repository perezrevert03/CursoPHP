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

<h3>Utilizando la funci�n each() y la construcci�n list()</h3>

<table border="1">
<tr>
  <th>Apellido</th>
  <th>Nombre</th>
</tr>

<?php 
reset($nombres);
while(list($apellido, $nombre) = each($nombres)) { 
?>
<tr>
  <td><?= $apellido ?></td>
  <td><?= $nombre ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>