<html>
<head>
<title>Fichero de prueba</title>
</head>
<body>
<h1>Fichero de prueba con matrices</h1>

<?
$matriz= array(
               "primera" => array(1, 2, 3),
               "segunda" => array(4, 0, 6),
               "tercera" => array(7, 8, 9)
              );
?>

<table border="1">
<? 
foreach($matriz as $clave => $fila) { 
?>
<tr>
<? 
   echo "<td><b>$clave</b></td>\n";
   foreach($fila as $valor) {
     echo "<td>$valor</td>\n";
   } // end foreach 
?>
</tr>
<? 
} // end foreach
?>
</table>

</body>
</html>