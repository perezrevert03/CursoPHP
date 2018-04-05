<?php

include "lib/setenv.php";

// Include principal
include "libcurso.php";

$VARS["title"]= "Sesiones prácticas";

// Contenidos
include "header.php";

print_topmenu($VARS["topmenu"]);
print_menu($VARS["leftmenu"]);

$t->open_td(array("class" => "content"));

$t->compact_h1("Ficheros actualizados");

$t->open_pre();
echo file_get_contents("/tmp/actualizar.log");
$t->close_pre();

$t->close_td();

include "footer.php";

