<?php
// Desactivar toda notificaci�n de error
error_reporting(0);
// Recogida de valores				 
$valor_sel_simple=$_POST['valor_sel_simple'];
echo("<br>valor_sel_simple: $valor_sel_simple");
@$valor_sel_multiple=$_POST['valor_sel_multiple'];
for($i=0;$i<count($valor_sel_multiple);$i++){
  echo("<br>valor_sel_multiple($i): $valor_sel_multiple[$i]; ");
}
?>
