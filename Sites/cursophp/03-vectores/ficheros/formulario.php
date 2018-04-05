<html>
<head>
  <title>Tienda de repuestos de Bob</title>
</head>
<body>
  <h1>Tienda de repuestos de Bob</h1>
  <h2>Formulario de petici&oacute;n</h2>

<?php

$productos= array(
        "Frenos" => "frenos",
        "Latas de aceite" => "aceite",
        "Neumáticos" => "ruedas"
);

?>

<form action="peticion.php" method="post">
  <table border="0">
    <tr bgcolor="#cccccc">
      <td width="150">Elementos</td>
      <td width="15">Cantidad</td>
    </tr>
      
      <?php
      while ($item= each($productos)) {
          $key = $item["key"];
          $value = $item["value"];
          echo "<tr>" .
              "<td>$key</td>" .
              "<td align='center'><input type='text' name='num$value' size='3' maxlength='3'></td>" .
              "</tr>";
      }
      ?>

    <tr>
      <td colspan="2" align="center"><input type="submit" value="Enviar petición"></td>
    </tr>
  </table>
</form>

</body>
</html>
