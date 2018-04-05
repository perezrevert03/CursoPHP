<?php
function imprime_factura($nombre, $direccion, $productos, $pedido, $parciales, $total)
{
    ?>
    <table width="80%" bgcolor="black" cellpadding="1">
        <tr>
            <td colspan="4" bgcolor="#f4f4f4" align="center">
                <span style="font-size: 140%">Tienda de recambios de Bob</span>
            </td>
        </tr>
        <tr>
            <td colspan="4" bgcolor="#f4f4f4">

                <table width="100%" bgcolor="#f4f4f4">
                    <tr>
                        <td>Nombre:</td>
                        <td><?= $nombre ?></td>
                    </tr>
                    <tr>
                        <td>Direcci&oacute;n:</td>
                        <td><?= $direccion ?></td>
                    </tr>
                </table>

            </td>
        </tr>

        <tr>
            <th width="100%" bgcolor="#f4f4f4">
                Producto
            </th>
            <th bgcolor="#f4f4f4">
                Precio unit.
            </th>
            <th bgcolor="#f4f4f4">
                Cantidad
            </th>
            <th bgcolor="#f4f4f4">
                Precio
            </th>
        </tr>

        <?php foreach ($pedido as $clave => $cantidad) { ?>
            <tr>
                <td width="100%" bgcolor="#ffffff">
                    <?= $productos[$clave]["desc"] ?>
                </td>
                <td bgcolor="#ffffff" align="right">
                    <?= $productos[$clave]["precio"] ?>
                </td>
                <td bgcolor="#ffffff" align="right">
                    <?= $cantidad ?>
                </td>
                <td bgcolor="#f4f4f4" align="right">
                    <?= $parciales[$clave] ?>
                </td>
            </tr>
        <?php } // endfor
        ?>

        <tr>
            <td width="100%" bgcolor="#f4f4f4" colspan="3" align="right">
                Subtotal<br>IVA<br><b>Total</b>
            </td>
            <td bgcolor="#f4f4f4" align="right">
                <?= number_format($total, 2) ?><br>
                <?= number_format($total * 0.21, 2) ?><br>
                <?= number_format($total * 1.21, 2) ?><br>
            </td>
        </tr>
    </table>

    <?php
} // end function imprime_factura
?>