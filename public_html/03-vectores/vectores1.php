<html>
<head>
<title>Fichero de prueba</title>
</head>
<body>
<h1>Fichero de prueba con vectores</h1>

<h3>Utilizando array</h3>
<ul>
<?php
$vector1= array(1,2,3,4,5,6,7,8,9,10);
for ($i= 0; $i<10; $i++) {
  echo "<li>Elemento $i: $vector1[$i]</li>";
}
?>
</ul>

<h3>Utilizando range</h3>
<ul>
<?php
$vector1= range(11,20);
for ($i= 0; $i<10; $i++) {
  echo "<li>Elemento $i: $vector1[$i]</li>";
}
?>
</ul>

</body>
</html>