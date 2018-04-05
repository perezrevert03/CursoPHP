<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<?php

$t= new tags();

$t->open_html();
$t->open_head();
$t->compact_title($VARS["title"]);
$t->single_meta(array("name" => "author",
		      "content" => "Sergio Sáez"));
$t->single_meta(array("http-equiv" => "Content-Type",
		      "content" => "text/html; charset=UTF-8"));
$t->single_link(array("rel" => "stylesheet",
		      "type" => "text/css",
		      "href" => "$root/lib/style.css"));
$t->compact_script("",array("type" => "text/javascript",
			    "src" => "$root/lib/menu.js"));

$t->open_script(array("type" => "text/javascript"));
?>
var submenu = new Array();
var tmr = new Array();
var adj = new Array();
var last_zIndex = 10000;
var menuWidth = 160;

<?php
$t->close_script();

include_custom_header(); 

$t->close_head();
$t->open_body(array("onload" => "initSubmenu()"));

// PAGE TABLE
$t->comment("PAGE TABLE");
$t->open_div(array("align" => "center"));
$t->open_table(array("class" => "page", 
		     "cellpadding" => "0", 
		     "cellspacing" => "0"));

// TOP ROW
$t->comment("TOP ROW");
$t->open_tr();
$t->open_td(array("colspan" => 2));

// TOP PART
$t->comment("TOP PART: Logos and title");
$t->open_table(array("width" => "100%"));
$t->open_tr();

$t->open_td(array("align" => "left", "width" => "1%"));
$t->single_img(array("src" => "$root/images/logo_etsinf.png", "height" => 48));
$t->close_td();

$t->compact_td(get_html($VARS["title"]), 
	       array("align" => "right", "width" => "98%", "class" => "head-text"));

$t->open_td(array("align" => "right", "width" => "1%"));
$t->single_img(array("src" => "$root/images/logo_php.png", "height" => 48));
$t->close_td();

$t->close_tr();
$t->close_table();

