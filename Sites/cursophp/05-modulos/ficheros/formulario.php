<html>
<head>
  <title><?php include "header.php";?></title>
</head>
<body>
<h1>Tienda de repuestos de Bob</h1>
<h2>Formulario de petici&oacute;n</h2>

<form action="peticion.php" method="post">
<table border="0">
<tr bgcolor="#cccccc">
  <td width="150">Elementos</td>
  <td width="15">Cantidad</td>
</tr>
<?php

include "precios.php";

foreach ($productos as $clave => $valor) {
    $titulo = $valor["desc"];
    $precio = $valor["precio"];
    $nombre = $clave;
    include "lineapedido.php";
} // Fin de foreach
?>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Enviar petición"></td>
</tr>
</table>
</form>
<?php include "footer.php";?>
</body>
</html>
