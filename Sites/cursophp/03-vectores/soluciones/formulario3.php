<html>
<head>
  <title>Tienda de repuestos de Bob</title>
</head>
<body>
<h1>Tienda de repuestos de Bob</h1>
<h2>Formulario de petici&oacute;n</h2>

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

if (isset($_POST["pedido"]))
   $pedido= $_POST["pedido"];

if (isset($_POST["producto"])) {
   $producto= $_POST["producto"];
   $cantidad= $_POST["cantidad"];
   if (trim($cantidad) != "" &&  $cantidad >0) {
      if (isset($pedido[$producto]))
         $pedido[$producto] += $cantidad;
      else
         $pedido[$producto] = $cantidad;
      echo "<p>Se han a&ntilde;adido $cantidad unidad/es de ". $productos[$producto]["desc"] . ".</p>";
   } // endif
} // endif
?>


<form action="formulario3.php" method="post">
<?
if (isset($pedido))
  foreach ($pedido as $clave => $valor) {
?>
<input type="hidden" name="pedido[<?= $clave ?>]" value="<?= $valor ?>">
<?
} // end foreach
?>

<table border="0">
<tr bgcolor="#cccccc">
  <td width="150">Elemento</td>
  <td width="15">Cantidad</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td>
  <select name="producto">
<?
foreach ($productos as $clave => $valor) {
?>
  <option value="<? echo $clave ?>">
  <? echo "$valor[desc] ($valor[precio] euros/ud)\n" ?>
  </option>
<?
} // Fin de foreach
?>
  </select>
</td>
<td align="center">
  <input type="text" name="cantidad" size="3" maxlength="3">
</td>
<td colspan="2" align="center">
  <input type="submit" value="A&ntilde;adir">
</td>
</tr>
</table>
</form>

<? if (isset($pedido) && count($pedido)>0) { ?>
<form action="peticion3.php" method="post">
El pedido realizado contiene:
<ul>
<?
foreach ($pedido as $clave => $valor) {
?>
<input type="hidden" name="pedido[<?= $clave ?>]" value="<?= $valor ?>">
<li><?= $productos[$clave]["desc"] ?>:
    <?= $valor ?> unidad/es
</li>
<?
} // end foreach
?>
</ul>
<input type="submit" value="Confirmar">
</form>
<? } // end if ?>
</body>
</html>

