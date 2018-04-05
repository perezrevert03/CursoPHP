<html>
<head>
  <title>Tienda de repuestos de Bob</title>
</head>
<body>
<h1>Tienda de repuestos de Bob</h1>
<h2>Formulario de petici&oacute;n</h2>

<form action="peticion.php" method="post">
<table border="0">
<tr bgcolor="#cccccc">
  <td width="150">Elementos</td>
  <td width="15">Cantidad</td>
</tr>
<tr>
  <td>Frenos</td>
  <td align="center"><input type="text" name="numfrenos" size="3" maxlength="3"></td>
</tr>
<tr>
  <td>Aceite</td>
  <td align="center"><input type="text" name="numaceite" size="3" maxlength="3"></td>
</tr>
<tr>
  <td>Ruedas</td>
  <td align="center"><input type="text" name="numruedas" size="3" maxlength="3"></td>
</tr>
<tr>
  <td>Distancia</td>
    <td align="center"><input type="text" name="distancia" size="3" maxlength="3"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Enviar petici&oacute;n"></td>
</tr>
</table>
    <table border="1" cellpadding="2">
        <tr bgcolor="#dedede">
            <td>Distancia (km)</td>
            <td>Precio (&euro;)</td>
        </tr>

        <tr bgcolor="#f0f0f0" align="center">
            <td>0 - 10</td>
            <td>5 &euro;</td>
        </tr>

        <tr bgcolor="#f0f0f0" align="center">
            <td>11 - 50</td>
            <td>10 &euro;</td>
        </tr>

        <tr bgcolor="#f0f0f0" align="center">
            <td>51 - 100</td>
            <td>20 &euro;</td>
        </tr>

        <tr bgcolor="#f0f0f0" align="center">
            <td>...</td>
            <td>... &euro;</td>
        </tr>

        for($i = 101; $i <= 1000; $i = $i + 100){
            $j = $i + 99;
            <tr bgcolor="#f0f0f0" align="center">
                <td>$i - $j</td>
                <td>... &euro;</td>
            </tr>
        }
    </table>
</form>

</body>
</html>
