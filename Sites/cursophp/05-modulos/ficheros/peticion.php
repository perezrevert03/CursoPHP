<html>
<head>
  <title>Tienda de recambios de Bob - Resultados de la petici&oacute;n</title>
</head>
<body>
<h1>Tienda de recambios de Bob</h1>
<h2>Resultados de la petici&oacute;n</h2>
<?php

include "precios.php";

echo "<p> Petici&oacute;n servida a las ";

echo date("H:i, jS F");
echo "<br>";
echo "<p>Su petici&oacute;n es la siguiente:";
echo "<br>";

foreach ($productos as $clave => $valor) {
   if (trim($_POST["num$clave"]) != "")
      echo $valor["desc"] . ": " .$_POST["num$clave"]."<br>\n";
}

$cantidad = 0;
$total = 0.00;

foreach ($productos as $clave => $valor) {
   if (trim($_POST["num$clave"]) != "") {
      $cantidad += intval($_POST["num$clave"]);
      $total += intval($_POST["num$clave"]) * $valor["precio"];
   } // end if
}

echo "<br>\n";
echo "N&uacute;mero de elementos solicitados: ".$cantidad."<br>\n";
echo "Subtotal: ";
echo number_format($total, 2);
echo " &euro;<br>\n";

$impuestos = 0.18;  // IVA del 18%
$total = $total * (1 + $impuestos);
$total = number_format($total, 2);
echo "Total con el IVA: ".$total." &euro;.<br>\n";

?>
</body>
</html>
