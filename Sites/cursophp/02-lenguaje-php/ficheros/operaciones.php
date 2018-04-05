<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>Resultados con dos n&uacute;meros</title>
</head>

<body>
    <h1>Resultados con dos n&uacute;meros</h1>

<?php
// Importar la variables del formulario con el prefijo 'f'
extract($_GET, EXTR_PREFIX_ALL, "f");
echo "Los n&uacute;meros son A=$f_numA y B=$f_numB<br>\n";

// A�adir aqu� el c�digo para mostrar el
//  resultado de las operaciones
echo "A + B = " . ($f_numA + $f_numB) . "<br>\n";
echo "A - B = " . ($f_numA - $f_numB) . "<br>\n";
echo "A * B = " . ($f_numA * $f_numB) . "<br>\n";
echo "A / B = " . ($f_numA / $f_numB) . "<br>\n";
echo "A mod B = " . ($f_numA % $f_numB) . "<br>\n";
echo "A = B? " . ($f_numA == $f_numB) . "<br>\n";
echo "A &lt B? " . var_dump($f_numA > $f_numB) . "<br>\n";
echo "A &gt B? " . var_dump($f_numA > $f_numB) . "<br>\n";
?>

</body>
</html>
