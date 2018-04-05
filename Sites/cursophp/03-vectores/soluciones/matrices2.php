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
$fila= reset($matriz);
while ($fila) {
   echo "<tr>\n";
   $valor= reset($fila);
   // Si no ponemos el !== y usamos != el bucle pararÃ­a con el valor 0
   while ($valor !== false) {
?>
  <td><?= $valor; ?></td>
<?
     $valor= next($fila);
   } // endwhile
  echo "</tr>\n";
  $fila= next($matriz);
} // endwhile
?>
</table>

</body>
</html>