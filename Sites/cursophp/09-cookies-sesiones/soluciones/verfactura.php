<?php
session_start();

require "factura.php";
require "precios.php";

include "header.php";

imprime_factura($_COOKIE["nombre"], $_COOKIE["direccion"],
    $productos,
    $_SESSION["pedido"],
    $_SESSION["costesParciales"],
    $_SESSION["total"]);

include "footer.php";