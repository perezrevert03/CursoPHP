<html>
<head>
  <title>Tienda de repuestos de Bob</title>
</head>
<body>
<h1>Tienda de repuestos de Bob</h1>
<h2>Formulario de peticiï¿½</h2>

<form action="peticion2.php" method="post">
<table border="0">
<tr bgcolor="#cccccc">
  <td width="150">Elementos</td>
  <td width="15">Cantidad</td>
</tr>
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
foreach ($productos as $clave => $valor) {
?>

<tr>
  <td><? echo "$valor[desc] ($valor[precio] euros/ud)" ?></td>
  <td align="center">
    <input type="text" name="num<? echo $clave ?>" size="3" maxlength="3">
  </td>
</tr>

<?
} // Fin de foreach
?>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Enviar petici&oacute;n"></td>
</tr>
</table>
</form>

</body>
</html>

