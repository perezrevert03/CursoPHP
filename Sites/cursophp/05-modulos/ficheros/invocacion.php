<html>
  <head>
    <title>Paso de par�metros a un m�dulo</title>
  </head>
  <body>
    <h1>Paso de par�metros a un m�dulo</h1>
<?php

// Establece el mensaje a imprimir
$param = "Este es el mensaje a imprimir";

// Incluye el m�dulo mensaje.php
include "mensaje.php";

// Imprime la respuesta del m�dulo
if(isset($param)) {
    echo $resp;
}
?>
  </body>
</html>
