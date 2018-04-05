<?php

function get_field($node, $default=false) {

    if (isset($node)) {
        return (string)$node;
    } else {
        return $default;
    } // endif

} // end get_field

function get_attribute($node, $key, $default=false) {

    if (isset($node[$key])) {
        return (string)$node[$key];
    } else {
        return $default;
    } // endif

} // end get_attribute

function create_node($node, &$menu) {

    global $VARS;

    $n_id= get_attribute($node, "id");
    $n_name= get_attribute($node, "name");	

    $menu["name"]= $n_name;
    $menu["place"]= get_attribute($node, "menu", "left");

    $VARS["info"][$n_id]= $n_name;

    foreach ($node->item as $item) {
	$id= get_attribute($item, "id");

	$menu["items"][$id]["id"]= $id;
	$menu["items"][$id]["name"]= get_attribute($item, "name", "Sin nombre");
	$menu["items"][$id]["link"]= get_attribute($item, "link", "$n_id/$id/");
	$menu["items"][$id]["title"]= get_field($item->title, $menu["items"][$id]["name"]);
	$menu["items"][$id]["desc"]= trim(get_field($item->desc));
	$menu["items"][$id]["parent"]= $n_id;

	$VARS["info"]["$n_id/$id"]= $menu["items"][$id]["name"];
    } // endfor

} // endfor

function load_menu($filename) {

    global $VARS;

    $xmenu= simplexml_load_file($filename);

    $VARS["menu-name"]= get_attribute($xmenu, "name");

    foreach ($xmenu->section as $section) {
	$id= get_attribute($section, "id");	
	$place= get_attribute($section, "menu", "left");

	$VARS["${place}menu"][$id]= array();
	create_node($section, $VARS["${place}menu"][$id]);
    } // endfor

  } // end load_menu

?>