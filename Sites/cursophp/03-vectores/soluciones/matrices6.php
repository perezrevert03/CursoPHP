<html>
<head>
<title>Fichero de prueba</title>
</head>
<body>
<h1>Fichero de prueba con matrices</h1>

<?
$matriz= array(
               array(1, 2, 3),
               array(4, 0, 6),
               array(7, 8, 9)
              );
?>

<table border="1">
<?
for($fila= reset($matriz); $fila !== false; $fila= next($matriz)) {
   echo "<tr>";
   for($valor= reset($fila); $valor !== false; $valor= next($fila)) {
     echo "<td>$valor</td>\n";
   } // endfor
   echo "</tr>";
} // endfor
?>
</table>

</body>
</html>