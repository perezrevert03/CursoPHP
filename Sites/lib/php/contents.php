<?php 

$menu_disable= false;
$topmenu_used= false;

function print_topless_menu() {

    global $VARS, $root, $t;

    $home= $VARS["home"];

    // TOP MENU 
    $t->comment("TOP MENU");

    $t->compact_div("", array("class" => "head"));

    $t->open_div(array("class" => "topnav"));
    $t->open_table(array("width" => "100%"));
    $t->open_tr();

    // NAVIGATION BAR
    $t->comment("NAVIGATION BAR");
    $t->open_td(array("align" => "left", "class" => "top-text"));

    $t->compact_a($VARS["menu-name"], array("href" => "$root/"));

    if (count($VARS["path-list"]) > 0) {
	$id_l= array();
	foreach($VARS["path-list"] as $nid) {
	    $id_l[]= $nid;
	    $pid= implode("/", $id_l);
	    $t->show("&nbsp;&raquo;&nbsp;");	    
	    $t->compact_a(get_html($VARS["info"][$pid]), array("href" => "$root/$pid"));
	} // end while
    } // endif

    $t->close_td();

    $t->close_tr();
    $t->close_table();
    $t->close_div();

    $t->close_td();
    $t->close_tr();

    // MAIN ROW
    $t->comment("MAIN ROW");
    $t->open_tr(array("class" => "body", "height" => "99%", "valign" => "top"));
    
    $toppart_flushed= true;
}

function print_topmenu($nodes) {

    global $VARS, $root;
    global $t, $toppart_flushed, $topmenu_used;

    $topmenu_used= true;

    // TOP MENU WINDOWS

    $t->comment("TOP MENU WINDOWS");
    $t->open_script(array("type" => "text/javascript"));
    echo "// Configuración del menu\n";
    $index= 0;
    foreach($nodes as $node) {
	echo "submenu['sm$index'] = new Array();\n";

	$sindex= 0;
	foreach($node["items"] as $item) {    	    
	    echo "submenu['sm$index'][$sindex] = \n";
	    echo "   menuItem('". get_html($item["name"])."', '$item[link]');\n";
	    $sindex++;
	} // end foreach
	$index++;
    } // endfor

    $t->close_script();

    // TOP MENU 
    $t->comment("TOP MENU");
    $t->compact_div("", array("class" => "topbar"));
    
    $t->open_table(array("class" => "topmenu", "cellspacing" => 0));
    $t->open_tr();

   // GLOBAL ACTIONS
    $t->comment("GLOBAL ACTIONS");
    $t->open_td(array("align" => "left", "class" => "top-option", "width" => "95%"));
    //$t->compact_a("[actualizar]", array("href" => "$root/actualizar.php"));
    $t->show("&nbsp;");
    $t->close_td();

    // MENU OPTIONS
    $t->comment("MENU OPTIONS");
    
    $index= 0;
    foreach($nodes as $node) {
	 $level= ($index % 6) +1;

	 $t->open_td(array("class" => "tmenu", "width" => "1%")); 
	 $t->open_div(array("class" => "tmenu$level", 
			    "id" => "sm$index",
			    "onmouseover" => "javascript:showSubmenu(this)",
			    "onmouseout" => "javascript:hideSubmenu(this)"));
	     
	 $t->compact_span(get_html($node["name"]), array("class" => "ttext"));
	 $t->compact_span("&nabla;", array("class" => "tarrow"));
	 $t->show("&nbsp;");
	 $t->close_div();

	 $t->close_td();

	 $index++;
    } // end foreach

    $t->close_tr();
    $t->close_table();

    // NAVIGATION BAR
    $t->comment("NAVIGATION BAR");
 
    $t->open_div(array("class" => "navbar"));

    $t->open_span(array("style" => "color: #ec6409;"));
    $t->show("&nbsp;&raquo;&nbsp;");
    $t->close_span();

    $t->compact_a($VARS["menu-name"], array("href" => "$root/"));

    if (count($VARS["path-list"]) > 0) {
	$id_l= array();
	foreach($VARS["path-list"] as $nid) {
	    if ($nid == "")
		break;
	    $id_l[]= $nid;
	    $pid= implode("/", $id_l);
	    if (!isset($VARS["info"][$pid]))
		break;
	    $t->show("&nbsp;::&nbsp;");
	    $t->compact_a(get_html($VARS["info"][$pid]), array("href" => "$root/$pid/"));
	} // end while
    } // endif
    $t->close_div();

    // MAIN ROW
    $t->comment("MAIN ROW");
    $t->open_tr(array("class" => "body", "height" => "99%", "valign" => "top"));
    
    $toppart_flushed= true;
}

function print_menu_header($node, $num=1) {

    global $t;

    if (isset($node["link"])) {
	$t->open_div(array("class" => "section$num"));

	$t->open_a(array("href" => "$node[link]"));
	$t->show(get_html($node["name"]));
	$t->close_a();

	$t->close_div();
    } else {
	$t->open_div(array("class" => "section$num-selected"));

	$t->show(get_html($node["name"]));

	$t->close_div();
    } // endif


} // print_menu_header

function print_menu_item($item) {

    global $VARS, $root, $t;

    if (in_array($item["id"], $VARS["path-list"])) {
	$t->open_div(array("class" => "soption"));
	$t->show("-&nbsp;" . get_html($item["name"]));
	$t->close_div();
    } elseif (is_dir($item["id"])) {
	$t->open_div(array("class" => "option"));
	$t->compact_a("-&nbsp;" . get_html($item["name"]), array("href" => "$root/$item[link]"));
	$t->close_div();
    } else {
	$t->open_div(array("class" => "doption"));
	$t->show("-&nbsp;" . get_html($item["name"]));
	$t->close_div();
    } // endif

} // end print_menu_item

function print_menu($menu) {

    global $root, $t;

    $mclass= "lmenu";

    $t->open_td(array("class" => $mclass, "width" => '10%'));
    
    $i_section= 1;
    foreach($menu as $section) {
	print_menu_header($section, $i_section);

	$t->open_div(array("class" => "options"));
    
	foreach($section["items"] as $item) {
	    print_menu_item($item);
	} // endfor

	$t->close_div();

	$i_section++;
    } // endfor

    $t->close_td();

} // end print_menu

function print_header($text, $level=1) {
    
    global $t;
    
    $t->compact_tag("h$level", get_html($text));

} // end print_header

function print_desc($text, $icon=false) {

    global $t, $root;

    $t->open_table(array("class" => 'desc1', "width" => '100%', "cellspacing" => '4'));
    $t->open_tr(array("valign" => 'top'));
    if ($icon) {
	$t->open_td();
	$t->single_img(array("src" => "$root/$icon"));
	$t->close_td();
    } else {
	$t->compact_td("&nbsp;");
    } // endif

    $t->compact_td(get_html($text), array("width" => "95%"));
    $t->close_tr();
    $t->close_table();
    
} // end print_desc

function print_message($text, $type="info", $icon=false) {

    global $t, $root;

    $t->open_table(array("class" => "$type-box", "width" => '100%', "cellspacing" => '4'));
    $t->open_tr(array("valign" => 'top'));
    if ($icon) {
	$t->open_td();
	$t->single_img(array("src" => "$root/images/icons/$icon.png"));
	$t->close_td();
    } else {
	$t->open_td();
	$t->single_img(array("src" => "$root/images/icons/$type.png"));
	$t->close_td();
    } // endif

    $t->compact_td(get_html($text), array("width" => "95%"));
    $t->close_tr();
    $t->close_table();
    
} // end print_message

function print_tree ($node, $level, $maxlevel=8) {

    global $home, $section;

    if ($level>=$maxlevel) return;
    
    foreach ($node["children"] as $cid) {
	$inode= $_SESSION["sections"][$cid];
	if ($cid == $section)
	    $optclass= "soption";
	else 
	    $optclass= "option";
	echo "<div class=\"$optclass\" style=\"padding-left: ". (2*$level +1) ."em\">\n";
	echo "<a href=\"". get_link($inode) ."\">\n";
	if (count($inode["children"])>0) 
	    echo "&raquo;";
	else
	    echo "-";
	echo "  <strong>". get_html($inode["name"]) ."</strong>";
	if ($inode["title"] != $inode["name"])
	    echo " :: ". get_html($inode["title"]);
	echo "</a>\n";	
	echo "</div>\n";
	print_tree($inode, $level +1, $maxlevel);
    } // endforeach

} // end print_tree

function print_view($current) {

    global $root, $APP;

    $img= get_image($current);

    echo "<table class='desc2' width='100%'>\n";
    echo "<tr valign='top'>\n";
    echo "<td width='1%'>&raquo;</td>\n";
    echo "<td width='95%'>";
    echo "<span style='font-weight: bold; font-size: 90%'>". get_html($current["title"]) . "</span><br />";
    echo get_html($current["desc"]);
    echo "</td>\n";

    if ($img)
	echo "<td><img src='$root/$img'></td>\n";

    echo "</tr>\n";
    echo "</table>\n";

} // end print_view


?>