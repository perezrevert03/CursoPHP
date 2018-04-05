<?php

$phpscript= $_SERVER["SCRIPT_FILENAME"];
$userhome= substr($phpscript, 0, strrpos($phpscript, "cursophp"));
$phplib=  $userhome. "lib/php"; 

set_include_path(get_include_path() . PATH_SEPARATOR . $phplib);

unset($phpscript);
unset($phplib);

?>