<?php

if(!isset($param)) {
    echo "No se ha inicializado la variable<br>";
    return;
}

// Imprime el mensaje recibido en $param
echo $param;

// Devuelve en la variable $resp el contenido del mensaje concatenado con la hora.
$resp = $param. "" . date("H:i:s");

?>
