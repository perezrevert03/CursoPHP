<?php

// Algunas funciones de uso general
include "common.php";

// La clase tags
include "tags.php";

// Definición de la estructura básica: menus superiores y laterales
include "contents.php";

// Funciones de acceso y creación de la estructura del menu
include "model.php";

// Common function invocations
get_location();

load_menu("menu.xml");

?>