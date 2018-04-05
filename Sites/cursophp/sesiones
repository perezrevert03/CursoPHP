<?php

include "lib/setenv.php";

// Include principal
include "libcurso.php";

$VARS["home-name"]= "Prácticas";

// Añade el elemento sesiones para que aparezca en la ruta
array_unshift($VARS["path-list"], "sesiones");

if (count($VARS["path-list"]) <= 1) {
    $VARS["title"]= "Sesiones prácticas";
 } else {
    $vpath= $VARS["path-list"];
    $key= rtrim(implode("/", $vpath), "/");

    while (!isset($VARS["info"][$key])) {
	array_pop($vpath);
	$key= rtrim(implode("/", $vpath), "/");
    } // end while

    if ($key != "") {
	$VARS["title"]= "Sesión: " . $VARS["info"][$key];
    } else {
	$VARS["title"]= "Sesiones prácticas";
    } // endif
 } // endif

// Contenidos
include "header.php";

print_topmenu($VARS["topmenu"]);
print_menu($VARS["leftmenu"]);

$t->open_td(array("class" => "content"));

// Elimina el elemento sesiones
array_shift($VARS["path-list"]);

switch (count($VARS["path-list"])) {
 default:
     // Muestra la información del elemento
     $i= 1;
     foreach($VARS["leftmenu"]["sesiones"]["items"] as $item) {
	print_header("$i .- " . $item["title"], 1);

	$t->compact_p(get_html($item["desc"]));

	$i++;
     } // endfor
     break;
 case 2:
     $item= $VARS["leftmenu"]["sesiones"]["items"][$VARS["path-list"][0]];
     if ($VARS["path-list"][1] == "") {
	$file= "$item[id]-ejer.html";
     } else {
	$file= $VARS["path-list"][1];
     } // endif

     $mainfile= "$item[id]/texto/$file";
     if (file_exists($mainfile)) {
	 // Incluye la página principal de la sesión de prácticas
	 include $mainfile;
     } else {
	 // La página principal de la sesión de prácticas no está disponible
	 print_header($item["title"]);

	 $t->compact_p(get_html($item["desc"]));

	 print_message("El fichero $mainfile todavía no está disponible. ".
		       "Ejecute el procedimiento de actualización", "error");
     } // endif
     break;
 } // endswitch

$t->close_td();

include "footer.php";

?>
