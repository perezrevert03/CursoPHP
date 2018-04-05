<html>
<head></head>
<body>
<!-- Enviando correos -->
<h3>Enviando correos</h3>
<hr>
<form name="correos" method="post" action="enviando_correos_s.php">
<!-- Creación e inicio de la tabla "correos" -->
<h4>Creación e inicio de la tabla "correos"</h4>
<input type="submit" name="DB_Crear" value="Crear tabla"/><br>
<hr>
<!-- Envío de un correo electrónico -->
<h4>Envío de un correo electrónico</h4>
<table>
<tr>
		<td align="right">Contacto a enviar el correo:</td>
		<td>
  	<select name="id">
  	<option value="0">- Ninguno -</option>
    <?
    	// Conectamos con la base de datos 
      $link = mysql_connect("localhost","root","root");
      // Seleccionamos la base de datos
      $db = mysql_select_db("agenda",$link);
    	// Montamos y lanzamos la consulta
    	$sql = "SELECT id, nombre, apellidos FROM contactos";
    	$result = mysql_query($sql);
    	while($row = mysql_fetch_object($result)){
    	  echo("<option value=\"$row->id\">$row->nombre $row->apellidos</option>");
    	}
    	if($result) mysql_free_result($result);
    	if($link) mysql_close($link);
    ?>
    </select>
  </td>
</tr>
<tr>
  <td align="right">De</td>
  <td><input type="text" name="valor_from" value=""/></td>
</tr>
<tr>
  <td align="right">Asunto</td>
	<td><input type="text" name="valor_subject" value=""/></td>
</tr>
</tr>
	<td align="right">Mensaje</td>
	<td><textarea cols="40" rows="4" name="valor_body"></textarea></td>
</tr>
<tr>
	<td>
  </td>
  <td>
  <input type="submit" name="Enviar" value="Enviar correo"/><br>
  </td>
</tr>
</table>
<hr>
<input type="checkbox" name="debug" checked>Mostrar progreso
</form>
<hr>
</body>
</html>