<?php
session_start();

// CONTROL
require "precios.php";
require "boblib.php";

$datos = obtener_datos();

foreach ($datos as $clave => $valor) {
    setcookie($clave, $valor);
}

$pedido = obtener_pedido($productos);
$cantidad = 0;
$total = coste_pedido($productos, $pedido, $costes_parciales);

$_SESSION["pedido"] = $pedido;
$_SESSION["total"] = $total;
$_SESSION["costesParciales"] = $costes_parciales;

// VISTA
include "header.php";

echo "<p> Petici&oacute;n servida a las " . date("H:i, jS F") . "<br>";

echo "<p>Su petici&oacute;n es la siguiente:";
echo "<br>";

imprimir_pedido($productos, $pedido);

echo "<br>";
echo "<a href='verfactura.php'>Ver factura</a>";

include "footer.php";