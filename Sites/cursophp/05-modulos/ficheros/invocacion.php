<html>
  <head>
    <title>Paso de parámetros a un módulo</title>
  </head>
  <body>
    <h1>Paso de parámetros a un módulo</h1>
<?php

// Establece el mensaje a imprimir
$param = "Este es el mensaje a imprimir";

// Incluye el módulo mensaje.php
include "mensaje.php";

// Imprime la respuesta del módulo
if(isset($param)) {
    echo $resp;
}
?>
  </body>
</html>
