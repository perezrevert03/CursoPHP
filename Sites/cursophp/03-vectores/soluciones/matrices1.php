<html>
<head>
<title>Fichero de prueba</title>
</head>
<body>
<h1>Fichero de prueba con matrices</h1>

<?
$matriz= array(
               array(1, 2, 3),
               array(4, 5, 6),
               array(7, 8, 9)
              );

?>

 <table border="1" cellpadding="<?= $padding ?>" cellspacing="2">

<?
for ($j= 0; $j< 3; $j++) {
  echo "<tr>\n";
  for ($i= 0; $i< 3; $i++) { ?>
  <td><? echo $matriz[$j][$i]; ?></td>
  <? } // endfor ?>
</tr>
<? } // endfor ?>
</table>

</body>
</html>