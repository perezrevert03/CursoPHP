<center>
<table width="80%" bgcolor="black" cellpadding="1">
  <tr>
    <td colspan="4" bgcolor="#f4f4f4" align="center">
      <span style="font-size: 140%">Tienda de recambios de Bob</span>
    </td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#f4f4f4">

<table width="100%" bgcolor="#f4f4f4">
  <tr>
    <td>Nombre:</td>
    <td></td>
  </tr>
  <tr>
    <td>Direcci&oacute;n:</td>
    <td></td>
  </tr>
</table>

    </td>
  </tr>

  <tr>
    <th width="100%" bgcolor="#f4f4f4">
      Producto
    </th>
    <th bgcolor="#f4f4f4">
       Precio unit.
    </th>
    <th bgcolor="#f4f4f4">
      Cantidad
    </th>
    <th bgcolor="#f4f4f4">
      Precio
    </th>
  </tr>

<?php foreach($pedido as $clave => $cantidad) { ?>
  <tr>
    <td width="100%" bgcolor="#ffffff">
      <!-- Descripción del producto -->
    </td>
    <td bgcolor="#ffffff" align="right">
      <!-- Precio unitario del producto -->
    </td>
    <td bgcolor="#ffffff" align="right">
      <!-- Número de unidades solicitadas -->
    </td>
    <td bgcolor="#f4f4f4" align="right">
      <!-- Coste del producto -->
    </td>
  </tr>
<?php } // endfor ?>

  <tr>
    <td width="100%" bgcolor="#f4f4f4" colspan="3" align="right">
      Subtotal<br>IVA<br><b>Total</b>
    </td>
    <td bgcolor="#f4f4f4" align="right">
      <?= number_format($total, 2) ?><br>
      <?= number_format($total * 0.18, 2) ?><br>
      <?= number_format($total * 1.18, 2) ?><br>
    </td>
  </tr>
</table>

</center>
