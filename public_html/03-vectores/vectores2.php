<html>
<head>
<title>Fichero de prueba</title>
</head>
<body>
<h1>Fichero de prueba con vectores</h1>

<h3>Utilizando un bucle while</h3>
<ul>
<?php
$vector= range(1,10);
$v= reset($vector);
while($v) {
  echo "<li>El elemento es $v</li>";
  $v= next($vector);
}
?>
</ul>

<h3>Utilizando un bucle for</h3>
<ul>
<?php
$vector= range(11,20);
for ($v= reset($vector); $v; $v= next($vector)) {
  echo "<li>El elemento es $v</li>";
}
?>
</ul>

</body>
</html>