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
reset($matriz);
while (list(,$fila)= each($matriz)) {
?>
<tr>
  <?
   reset($fila);
   while (list(,$valor)= each($fila)) {
  ?>
  <td><?= $valor; ?></td>
  <?
   } // endwhile
  ?>
</tr>
<?
} // endwhile
?>
</table>

</body>
</html>