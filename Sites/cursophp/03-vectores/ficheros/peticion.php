<html>
<head>
  <title>Tienda de recambios de Bob - Resultados de la petición</title>
</head>
<body>
<h1>Tienda de recambios de Bob</h1>
<h2>Resultados de la petici&oacute;n</h2>
<?php
  echo "<p> Petici&oacute;n servida a las ";

  import_request_variables("p", "f_");

  echo date("H:i, jS F");
  echo "<br>";
  echo "<p>Su petici&oacute;n es la siguiente:";
  echo "<br>";
  echo $f_numfrenos." frenos.<br>";
  echo $f_numaceite." latas de aceite.<br>";
  echo $f_numruedas." neum&aacute;ticos.<br>";

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
  echo "N&uacute;mero de elementos solicitados: ".$cantidad."<br>\n";
  echo "Subtotal: ";
  echo number_format($total, 2);
  echo " &euro;<br>\n";

  $impuestos = 0.18;  // IVA del 18%
  $total = $total * (1 + $impuestos);
  $total = number_format($total, 2);
  echo "Total con el IVA: ".$total." &euro;<br>\n";

?>
</body>
</html>
