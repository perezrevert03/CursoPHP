<?php

function get_location() {

    global $VARS, $root;

    $requri= $_SERVER["REQUEST_URI"];
    $qmark= strrpos($requri, "?");
    if ($qmark)
	$requri= substr($requri, 0, $qmark);

    $VARS["uri"]= $requri;
    
    if (isset($_SERVER["PATH_INFO"])) {
	$VARS["home"]= substr($requri, 0, strrpos($requri, $_SERVER["PATH_INFO"]));    
	$VARS["path-str"]= trim($_SERVER["PATH_INFO"], "/");
	$VARS["path-list"]= explode("/", $_SERVER["PATH_INFO"]);
	if ($VARS["path-list"][0] == "") {
	    array_shift($VARS["path-list"]);
	} // endif
    } else {
	$VARS["home"]= rtrim($VARS["uri"], "/");
	$VARS["path-str"]= "";
	$VARS["path-list"]= array();
    } // endif

    $root= substr($_SERVER["SCRIPT_NAME"], 0, strrpos($_SERVER["SCRIPT_NAME"], "cursophp")); 
    
    $VARS["root"]= $root;
    
  } // end get_location

function include_custom_header() {

    global $_header, $root;

    if (isset($_header["custom-content"]) and is_array($_header["custom-js"])) {
	foreach ($_header["custom-content"] as $content) {
	    echo "     <meta http-equiv='$content[type]' content='$content[data]'>\n";
	} // endfor
    }	// endif

    if (isset($_header["custom-style"]) and is_array($_header["custom-style"])) {
	foreach ($_header["custom-style"] as $stylesheet) {
	    echo "     <link rel='stylesheet' type='text/css' href='$root/$stylesheet'>\n";
	} // endfor
    }	// endif

    if (isset($_header["custom-js"]) and is_array($_header["custom-js"])) {
	foreach ($_header["custom-js"] as $jsfile) {
	    echo "     <script type='text/javascript' src='$root/$jsfile'></script>\n";
	} // endfor
    }	// endif

} // end print_custom_header

function web_jump($str) {
    header("Location: $str"); /* Redirect browser */

    exit;
} // end web_jump 

function get_html($s) {
    return htmlentities($s, ENT_COMPAT, "utf-8");
}

function get_text($s) {
    return html_entity_decode($s, ENT_COMPAT);
}

function get_array_value($vect, $key, $default) {

    if (isset($vect[$key])) {
	return $vect[$key];
    } else {
	return $default;
    } // endif

} // end get_array_value

function debug($vector) {
   echo "<pre>";
   var_dump($vector);
   echo "</pre>";
}

?>