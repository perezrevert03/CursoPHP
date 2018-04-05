<?php
// Desactivar toda notificaci�n de error
error_reporting(0);
	// Conectamos con MySQL
 	$link = mysqli_connect("localhost","root","root");
  if(!$link) die("<br>Error: En la conexi�n con MySQL: ".mysqli_error());

	// Seleccionamos la base de datos "agenda"
	$db = mysqli_select_db($link, "agenda");
  if(!$db) die("<br>Error: En la selecci�n de la base de datos: ".mysqli_error());

	// Creamos el c�digo SQL
    $sql = "SELECT * FROM contactos";
	// Lanzamos la consulta
	$result = mysqli_query($link, $sql);
	if(!$result) die("ERROR: En la consulta: ".mysqli_error());
	
	// Inclusi�n de la librer�a "fpdf.php"
	require "fpdf.php";
	
	// Creamos el documento
	$pdf=new FPDF("P","mm","A4");
	
	// A�adimos una p�gina
	$pdf->AddPage();
	
	// Inserci�n del t�tulo
    $pdf->SetTitle("Agenda");
	$pdf->SetFont("Times","B",18);
	$pdf->SetTextColor(32,32,128);
	// Datos de los contactos
    $datos = array();
    while($row = mysqli_fetch_object($result)) {
        $nombre = "$row->nombre $row->apellidos";
        $telefono = "$row->telefono";
        $datos["$nombre"] = "$telefono";
    }
	
	// Recorremos los resultados y rellenamos el pdf
    while ($item= each($datos)) {
        $cadena = $item["key"]." (".$item["value"].")";
        $pdf->Write(8,$cadena."\r\n");
    } // endwhile


	// Liberamos los recursos
	mysqli_free_result($result);

	// Finalizaci�n del pdf
    $pdf->Output();
	
	// Cerramos la conexi�n
  if(!mysqli_close($link)) die ("Error en el cierre de la base de datos: ".mysql_error());
?>