<html>
  <head>
    <title>Comprueba los segundos</title>
  </head>
  <body>
    <h1>Comprueba los segundos</h1>
<?php

$segundos= date('s');

if($segundos % 2 == 0)
    include "par.php";
else
    include "impar.php";
?>
  </body>
</html>
