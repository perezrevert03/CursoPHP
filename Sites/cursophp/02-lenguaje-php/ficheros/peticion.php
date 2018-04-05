<html>
<head>
  <title>Tienda de recambios de Bob - Resultados de la petici&oacute;n</title>
</head>
<body>
<h1>Tienda de recambios de Bob</h1>
<h2>Resultados de la petici&oacute;n</h2>
<?php
  // deprecated -- import_request_variables("gp", "f_");
  extract($_POST, EXTR_PREFIX_ALL, "f");

  echo "<p> Petici&oacute;n servida a las ";

  echo date("H:i, jS F");
  echo "<br>";
  echo "<p>Su petici&oacute;n es la siguiente:";
  echo "<br>";

  if($f_numfrenos == 0)
      echo "No se han solicitado frenos.<br>";
  else
    echo $f_numfrenos." frenos.<br>";

  if($f_numaceite == 0)
      echo "No se ha solicitado aceite.<br>";
  else
    echo $f_numaceite." latas de aceite.<br>";

  if($f_numruedas == 0)
      echo "No se han solicitado ruedas.<br>";
  else
      echo $f_numruedas." ruedas.<br>";

  $cantidad = 0;
  $total = 0.00;

  define("PRECIOFRENOS", 100);
  define("PRECIOACEITE", 10);
  define("PRECIORUEDAS", 4);

  $cantidad = $f_numfrenos + $f_numaceite + $f_numruedas;
  $total = $f_numfrenos * PRECIOFRENOS
           + $f_numaceite * PRECIOACEITE
           + $f_numruedas * PRECIORUEDAS;

  echo "<br>\n";
  echo "N&uacute;mero de elemntos solicitados: ".$cantidad."<br>\n";
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
