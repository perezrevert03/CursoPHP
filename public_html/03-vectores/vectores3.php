<html>
<head>
<title>Fichero de prueba</title>
</head>
<body>
<h1>Fichero de prueba con vectores</h1>

<h3>Utilizando un bucle while para recorrerlo a la inversa</h3>
<ul>
<?php
$vector= range(1,10);
$v= end($vector);
while($v) {
  echo "<li>El elemento es $v</li>";
  $v= prev($vector);
}
?>
</ul>

<h3>Utilizando un bucle for para recorrerlo a la inversa</h3>
<ul>
<?php
$vector= range(11,20);
for ($v= end($vector); $v; $v= prev($vector)) {
  echo "<li>El elemento es $v</li>";
}
?>
</ul>

</body>
</html>