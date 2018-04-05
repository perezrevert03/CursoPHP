<?php
// M?dulo con la definici?n de las funciones de uso com?n en la Tienda de Bob
function imprime_linea_pedido($titulo, $nombre, $precio) {
    ?>
    <tr>
        <td><?php echo "$titulo ($precio euros/ud)" ?></td>
        <td align="center">
            <input type="text" name="num<?php echo $nombre ?>" size="3" maxlength="3">
        </td>
    </tr>

    <?php
} //end function

function obtener_pedido($productos) {
    $pedido = array();

    foreach ($productos as $clave => $valor) {
        if (trim($_POST["num$clave"]) != "") {
            $pedido[$clave] =intval($_POST["num$clave"]);
        } //endif
    } // endfor

    return $pedido;
} //endfunction

function imprime_pedido($productos, $pedido) {

    if(count($pedido) == 0) {
        echo "No has solicitado nada<br\n>";
    } else {
        echo "<ul>\n";
        foreach ($pedido as $clave => $valor) {
            echo "<li>" . $productos[$clave]["desc"] . ": $valor\n";
        }
        echo "</ul>\n";
    }
} //endfunction

function coste_pedido($productos, $pedido) {
    $coste = 0.0;

    foreach ($pedido as $clave => $valor) {
        $coste += $productos[$clave]["precio"] * $valor;
    }

    return $coste;
} //endfunction



?>
