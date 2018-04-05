<html>
<head>
  <title>Tienda de recambios de Bob - Resultados de la petici&oacute;n</title>
</head>
<body>
<h1>Tienda de recambios de Bob</h1>
<h2>Resultados de la petici&oacute;n</h2>
<?
$productos= array("frenos" => array("desc"=>"Frenos",
                                    "precio"=>100),
                  "aceite" => array("desc"=>"Latas de aceite",
                                    "precio"=>10),
                  "ruedas" => array("desc"=>"Neum&aacute;ticos",
                                    "precio"=>4),
                  "bujias" => array("desc"=>"Buj&iacute;as",
                                    "precio"=>2)
                 );

echo "<p> Petici&oacute;n servida a las ";
echo date("H:i, jS F");
echo "<br>";

if (isset($_POST["pedido"])) {
  $pedido= $_POST["pedido"];
  echo "<p>Su petici&oacute;n es la siguiente:";
  echo "<br>";

  foreach ($pedido as $prod => $cant) {
    echo $productos[$prod]["desc"] . ": ".$cant."<br>\n";
  } // endforeach
} else {
  $pedido= array();
} // endif


$cantidad = 0;
$total = 0.00;

foreach ($productos as $prod => $cant) {
   $cantidad += intval($cant);
   $total += intval($cant) * $productos[$prod]["precio"];
}

echo "<br>\n";
echo "N&uacute;mero de elementos solicitados: ".$cantidad."<br>\n";
echo "Subtotal: ";
echo number_format($total, 2);
echo " euros <br>\n";

$impuestos = 0.16;  // IVA del 16%
$total = $total * (1 + $impuestos);
$total = number_format($total, 2);
echo "Total con el IVA: ".$total." euros.<br>\n";

?>
</body>
</html>
