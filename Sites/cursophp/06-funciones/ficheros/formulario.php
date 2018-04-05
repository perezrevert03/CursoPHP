<html>
<head>
  <title>Tienda de repuestos de Bob</title>
</head>
<body>
<h1>Tienda de repuestos de Bob</h1>
<h2>Formulario de petici�n</h2>

<form action="peticion.php" method="post">
<table border="0">
  <tr bgcolor="#cccccc">
    <td width="150">Elementos</td>
    <td width="15">Cantidad</td>
  </tr>
<?php
require "precios.php";
require "boblib.php";

foreach ($productos as $clave => $valor) {

    imprime_linea_pedido($valor["desc"], $clave, $valor["precio"]);

} // Fin de foreach
?>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Enviar petici�n"></td>
  </tr>
</table>
</form>

</body>
</html>