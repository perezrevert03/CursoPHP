<html>
<head>
<title>Fichero de prueba con matrices</title>
</head>
<body>
<h1>Fichero de prueba con matrices</h1>

<?php

$matriz= array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
);

?>

<table border="1">
    <?php
    for($i = 0; $i < 3; $i++) {
        echo "<tr>\n";
        for($j = 0; $j < 3; $j++) {
            $elem = $matriz[$i][$j];
            echo "<td>$elem</td>\n";
        }
        echo "</tr>\n";
    }
    ?>
</table>

<table border="1">
    <?php
    for($fila = reset($matriz); $fila != false; $fila = next($matriz)) {
        echo "<tr>\n";
        for($elem = reset($fila); $elem != false; $elem = next($fila)) {
            echo "<td>$elem</td>\n";
        }
        echo "</tr>\n";
    }
    ?>
</table>

<table border="1">
    <?php
    foreach($matriz as $fila) {
        echo "<tr>\n";
        foreach($fila as $elem) {
            echo "<td>$elem</td>\n";
        }
        echo "</tr>\n";
    }
    ?>
</table>

</body>
</html>
