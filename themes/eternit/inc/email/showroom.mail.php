<?php
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table width="600" border="0">
  <tr>
    <td width="100"><span style="font-family: Verdana;">Nome:</span></td>
    <td width="500"><span style="font-family: Verdana;">'.$_POST['name'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Email:</span></td>
    <td><span style="font-family: Verdana;">'.$_POST['email'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Telefone:</span></td>
    <td><span style="font-family: Verdana;">'.$_POST['telephone'].'</span></td>
  </tr>
  <tr>
    <td width="100"><span style="font-family: Verdana;">Ocupa&ccedil;&atilde;o atual:</span></td>
    <td width="500"><span style="font-family: Verdana;">'.$_POST['occupation'].'</span></td>
  </tr>
  <tr>
    <td><span style="font-family: Verdana;">Mensagem:</span></td>
    <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;">'.$_POST['message'].'</span></td>
  </tr>
</table>
</body>
</html>';
?>