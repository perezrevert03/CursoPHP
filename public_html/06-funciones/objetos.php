<?php

require "tags.php";


$tabla= array("uno" => 1, 
	      "dos" => 2,
	      "tres" => 3);

$estilo_cab= array("bgcolor" => "#e0e4f4",
		   "style" => "border-right: thin solid DarkBlue");

$t= new tags;

$t->open_html();
$t->open_body();
$t->open_table(array("style" => "border: thin solid black"));

foreach($tabla as $clave => $valor) {   
    $t->open_tr();

    $t->compact_td($clave, $estilo_cab);
    $t->compact_td($valor);

    $t->close_tr();
} // endfor

$t->close_table();
$t->close_body();
$t->close_html();

?>