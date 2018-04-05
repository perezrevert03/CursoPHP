<?php
// Desactivar toda notificaci�n de error
error_reporting(0);
session_start();
// Recogida de valores
echo("<br><h3>Ejemplo de sesiones</h3>");
$valor_C = $_SESSION['valor_C'];
echo("<br>valor_C: $valor_C");
session_close();
?>