<html>
<head>
   <title>Tienda de recambios de Pep - Resultados</title>
</head>
<body>
<h1>Tienda de recambios de Pep</h1>
<h2>Resultados</h2>
<?php
   /* Extrae los campos enviados por método POST y
     los pone en variables con el prefijo 'f_' */
   extract($_POST, EXTR_PREFIX_ALL, "f");

   echo "<p>Petición procesada a las ";
   echo date("H:i, jS F");
   echo "<br>\n";
   echo "<p>Su petición es la siguiente:";
   echo "<br>\n";
   echo $f_numfrenos." frenos<br>\n";
   echo $f_numaceite." botellas de aceite<br>\n";
   echo $f_numruedas." ruedas<br>\n";
   $totalcant = 0;
   $totaleuros = 0.00;
   define("PRECIOFRENO", 10);
   define("PRECIOACEITE", 5);
   define("PRECIORUEDA", 100);
   $totalcant = $f_numfrenos + $f_numaceite + $f_numruedas;
   $totaleuros = $f_numfrenos * PRECIOFRENO
                  + $f_numaceite * PRECIOACEITE
                  + $f_numruedas * PRECIORUEDA;
   echo "<br>\n";
   echo "Elementos:             ".$totalcant."<br>\n";
   echo "Subtotal:             $";
   echo number_format($totaleuros, 2);
   echo "<br>\n";
   $iva = 0.21; // IVA
   $totaleuros = $totaleuros * (1 + $iva);
   $totaleuros = number_format($totaleuros, 2);
   echo "Total m&aacute;s IVA: $".$totaleuros."<br>\n";
?>
</body>
</html>
