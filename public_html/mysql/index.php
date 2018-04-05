<?php
    $link = mysqli_connect("localhost", "root", "root");

    if(!$link) {
        die("Error en la conexión.".mysqli_error());
    } else {
        echo("Conexión correcta.");
    }

    /*$db_ejemplo = mysqli_select_db($link, "ejemplo");

    if(!$db_ejemplo) {
        echo "<br>Error en la selección: ".msqli_error();
    } else {
        echo "<br>Selección correcta.";
    }*/

    $sql = "CREATE DATABASE fotografia";
    $result = mysqli_query($link, $sql);

    if(!$result) {
        die("<br>Error: ".mysqli_error());
    } else {
        echo "<br>$result";
    }

    if(!mysqli_close($link)) {
        die("<br>Error en la desconexión.");
    } else {
        echo "<br>Desconexión correcta.";
    }


?>