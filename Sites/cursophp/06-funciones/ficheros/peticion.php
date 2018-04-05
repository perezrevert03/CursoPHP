<html>
<head>
  <title>Tienda de recambios de Bob - Resultados de la petici�n</title>
</head>
<body>
<h1>Tienda de recambios de Bob</h1>
<h2>Resultados de la petici�n</h2>
<?php
require "precios.php";
require "boblib.php";

echo "<p> Petici�n servida a las ". date("H:i, jS F") . "<br>";

echo "<p>Su petici�n es la siguiente:";
echo "<br>";


$pedido= obtener_pedido($productos);
imprime_pedido($productos, $pedido);

$cantidad = 0;
$total = 0.00;

foreach ($productos as $clave => $valor) {
    if (trim($_POST["num$clave"]) != "") {
        $cantidad += intval($_POST["num$clave"]);
        $total += intval($_POST["num$clave"]) * $valor["precio"];
    } // end if
}

echo "<br>\n";
echo "N�mero de elementos solicitados: ".$cantidad."<br>\n";
echo "Subtotal: ";
echo number_format($total, 2);
echo " euros <br>\n";

$impuestos = 0.21;  // IVA del 21%
$total = $total * (1 + $impuestos);
$total = number_format($total, 2);
echo "Total con el IVA: ".$total." euros.<br>\n";

?>
</body>
</html>
