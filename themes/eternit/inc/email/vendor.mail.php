<?php
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <table width="600" border="0">
            <tr>
                <td width="220"><span style="font-family: Verdana;">CNPJ:</span></td>
                <td width="380"><span style="font-family: Verdana;">'.$_POST['cnpj'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Razão Social:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['razao_social'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Inscrição estadual:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['inscricao_estadual'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Inscrição municipal:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['inscricao_municipal'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Endereço:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['endereco'].', '.$_POST['numero'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Complemento:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['complemento'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Bairro:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['bairro'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Cidade:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['cidade'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Estado:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['uf'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">CEP:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['cep'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Telefone:</span></td>
                <td><span style="font-family: Verdana;">'.$_POST['ddd'].$_POST['telefone'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Principais clientes:</span></td>
                <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;">'.$_POST['clientes'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Nome do contato comercial:</span></td>
                <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;">'.$_POST['contato_comercial'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Telefone do contato comercial:</span></td>
                <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;">'.$_POST['tel_contato_comercial'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Site da Empresa:</span></td>
                <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;"><a href="'.$_POST['site'].'">'.$_POST['site'].'</a></span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Região de atuação:</span></td>
                <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;">'.$_POST['regiao'].'</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Verdana;">Área de atividade:</span></td>
                <td><span style="font-family: Verdana;"></span><span style="font-family: Verdana;">'.$_POST['area'].'</span></td>
            </tr>
        </table>
    </body>
</html>';
?>