<html>
<head>
  <title>Tienda de recambios de Bob - Resultados de la petición</title>
</head>
<body>
<h1>Tienda de recambios de Bob</h1>
<h2>Resultados de la petición</h2>
<? 
$productos= array("frenos" => array("desc"=>"Frenos", 
                                    "precio"=>100),
                  "aceite" => array("desc"=>"Latas de aceite", 
                                    "precio"=>10), 
                  "ruedas" => array("desc"=>"Neumáticos", 
                                    "precio"=>4),
                  "bujias" => array("desc"=>"Bujías",
                                    "precio"=>2)
                 );
                 
echo "<p> Petición servida a las "; 

echo date("H:i, jS F");
echo "<br>";
echo "<p>Su petición es la siguiente:";
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
echo "Número de elementos solicitados: ".$cantidad."<br>\n";
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
