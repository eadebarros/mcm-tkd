<?php
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table width="600" border="0">
  <tr>
    <td width="200"><span style="font-family: Verdana;">Tipo:</span></td>
    <td width="400"><span style="font-family: Verdana;">'.$_POST['type'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Formul&aacute;rio:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['form'])).'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Nome:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['name'])).'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Email:</span></td>
    <td><span style="font-family: Verdana;">'.$_POST['email'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">CPF:</span></td>
    <td><span style="font-family: Verdana;">'.$_POST['cpf'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Endere&ccedil;o:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['address'])).' - '.$_POST['number'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Bairro:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['district'])).'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Cidade:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['city'])).'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Estado:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['state'])).'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">CEP:</span></td>
    <td><span style="font-family: Verdana;">'.$_POST['cpf'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Telefone:</span></td>
    <td><span style="font-family: Verdana;">'.$_POST['telephone'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Loja onde adquiriu o produto:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['shop'])).'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Data da compra:</span></td>
    <td><span style="font-family: Verdana;">'.$_POST['purchase_date'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Produto:</span></td>
    <td><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['product'])).'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Mensagem:</span></td>
    <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;">'.htmlentities(utf8_encode($_POST['message'])).'</span></td>
  </tr>
</table>
</body>
</html>';
?>