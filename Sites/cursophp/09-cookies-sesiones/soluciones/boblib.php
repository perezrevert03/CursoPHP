<?php

function obtener_datos()
{
    $datos["nombre"] = filter_input(INPUT_POST,
        "nombre",
        FILTER_SANITIZE_STRING);
    $datos["direccion"] = filter_input(INPUT_POST,
        "direccion",
        FILTER_SANITIZE_STRING);

    return $datos;
}

function imprime_linea_pedido($nombre, $varname, $precio)
{
    ?>

    <tr>
        <td nowrap="nowrap"><?php echo "$nombre ($precio euros/ud)" ?></td>
        <td align="center">
            <input type="text" name="num<?php echo $varname ?>" size="3" maxlength="3">
        </td>
    </tr>

    <?php
}

function obtener_pedido($productos)
{
    $pedido = [];

    foreach ($productos as $id => $producto) {
        $cantidad = filter_input(INPUT_POST, "num{$id}", FILTER_VALIDATE_INT);
        if ($cantidad !== false) {
            $pedido[$id] = $cantidad;
        }
    }

    return $pedido;
}

function imprimir_pedido($productos, $pedido)
{

    if (count($pedido) == 0) {
        echo "<p>No has solicitado nada ... taca&ntilde;o!</p>\n";
    } else {
        echo "<ul>\n";
        foreach ($pedido as $id => $cantidad) {
            echo "<li>" . $productos[$id]["desc"] . ": $cantidad</li>\n";
        }
        echo "</ul>\n";
    }

}

function coste_pedido($productos, $pedido, &$parcial)
{
    $coste = 0.0;
    $parcial = [];

    foreach ($pedido as $id => $cantidad) {
        $coste_producto = $productos[$id]["precio"] * $cantidad;
        $parcial[$id] = $coste_producto;
        $coste += $coste_producto;
    }

    return $coste;
}

?>
