<?
// Desactivar toda notificación de error
error_reporting(0);
  // Recogemos la variable de monitorización
  $debug = $_POST['debug'];
			
	// Lo primero es comprobar qué botón se ha pulsado 
	$boton_crear = /* A Rellenar */;
	$boton_enviar = /* A Rellenar */;
	
  // Conectamos con MySQL
  $link = mysql_connect("localhost","root","root");
  if(!$link) die("<br>Error: En la conexión con MySQL: ".mysql_error());
   
  // Seleccionamos la base de datos "agenda"
  $db = mysql_select_db("agenda",$link);
  if(!$db) die("<br>Error: En la selección de la base de datos: ".mysql_error());

  // Comprobación de que se ha pulsado la opción de crear la tabla 	
	if(/* A Rellenar */){
    	echo("<br><h3>Creación e inicio de la tabla \"correos\"</h3>");

    	// Borramos la tabla de "correos"
     	$sql = /* A Rellenar */;
     	$result = mysql_query($sql);	
     
     	// Creamos la tabla de correos
     	$sql = /* A Rellenar */; 
     	$result = mysql_query($sql);
     	if(!$result) die ("<br>Error: En la creación de la tabla 'correos': ".mysql_error());
     	else if($debug) echo("<br>OK: Creación correcta de la tabla 'correos'");
    
     	// Insertamos los correos en una sola consulta
     	$sql = /* A Rellenar */;
    	// Lanzamos la consulta 
      $result = mysql_query($sql);
    	// Comprobamos el resultado
     	if(!$result) die ("<br>Error: En la inserción de los contactos ejemplo: ".mysql_error());
     	else if($debug) echo("<br>OK: En la inserción de los contactos ejemplo");
    
	}
	
  // Comprobación de que se ha pulsado la opción de enviar un correo 	
	if(!empty($boton_enviar)){
    echo("<br><h3>Envío de correo electrónico</h3>");
			
		// Recogemos los valores correspondientes del formulario
		$id_to = /* A Rellenar */;
 	  $from = /* A Rellenar */;
		$subject = /* A Rellenar */;
		$body = /* A Rellenar */;
		
		// Buscamos si los correos del contacto
		$sql = /* A Rellenar */;
		
		// Lanzamos la consulta
		$result = mysql_query($sql);
		// Comprobamos que se ha leido algún correo
		if($result){
  		// Recogemos el resultado, y enviamos un correo por cada dirección
  		while($row = mysql_fetch_object($result)){
  		  /* A Rellenar */;
  		}
  		// Liberamos los recursos
  		mysql_free_result($result);
		}
	}	
	
 	// Cerramos la conexión
  if(!mysql_close($link)) die ("Error en el cierre de la base de datos: ".mysql_error());
?>
