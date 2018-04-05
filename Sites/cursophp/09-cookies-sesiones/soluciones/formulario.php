<?php
// CONTROL
require "precios.php";
require "boblib.php";

// VISTA
include "header.php";
?>

<form action="peticion.php" method="post">
    <table>
        <tr>
            <td colspan="2" bgcolor="#cccccc">Datos de facturaci&oacute;n</td>
        </tr>
        <tr>
            <td>Nombre:</td>
            <td><input type="text" name="nombre" size="20"></td>
        </tr>
        <tr>
            <td>Direcci&oacute;n:</td>
            <td><input type="text" name="direccion" size="80"></td>
        </tr>
    </table>
    <br>
    <table border="0">
        <tr bgcolor="#cccccc">
            <td width="150">Elementos</td>
            <td width="15">Cantidad</td>
        </tr>
        <?php
        foreach ($productos as $id => $producto) {
            imprime_linea_pedido($producto["desc"], $id, $producto["precio"]);
        } // Fin de foreach
        ?>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Enviar petici&oacute;n"></td>
        </tr>
    </table>
</form>

<?php
include "footer.php";
