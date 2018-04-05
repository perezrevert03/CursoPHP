<?php

$t->close_tr();

$t->comment("BOTTOM ROW");
$t->open_tr();
$t->open_td(array("colspan" => 2));

$t->compact_div("", array("class" => "bottombody"));

$t->open_table(array("class" => "foot", "width" => "100%"));
$t->open_tr();

$t->compact_td(get_html($_SERVER["REMOTE_ADDR"]), array("align" => "left", "class" => "foot-text"));

$t->open_td(array("align" => "right", "class" => "foot-text"));
$t->compact_a("ssaez@disca.upv.es",
	      array("href" => "mailto:ssaez@disca.upv.es",  
		    "title" => "Enviar un correo electr&oacute;nico a Sergio S&aacute;ez"));
$t->close_td();

$t->close_tr();
$t->close_table();

$t->close_td();
$t->close_tr();
$t->close_table();

$t->close_div();
$t->close_body();
$t->close_html();

?>