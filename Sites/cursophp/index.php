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

include "intro.html";

$t->close_td();

include "footer.php";

?>