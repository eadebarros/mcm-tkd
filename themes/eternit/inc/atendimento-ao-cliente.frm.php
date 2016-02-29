<?php
$CustomerService = new CustomerService();
$CustomerService->loadForm();
$CustomerService->insert();

include 'inc/phpmailer/class.phpmailer.php';

if($_POST['form'] === "produto") {
    include $ThemePath.'inc/email/produto.mail.php';
} else {
    include $ThemePath.'inc/email/atendimento.mail.php';
}
//include body

$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
/*$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.office365.com"; // Endereço do servidor SMTP
$mail->Port = 587;
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'mkt@saphyr.com.br'; // Usuário do servidor SMTP
$mail->Password = ''; // Senha do servidor SMTP
$mail->SMTPSecure = 'tls';*/

//$mail->Host = "localhost"; // Endereço do servidor SMTP
//$mail->Port = 25;

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "sac@eternit.com.br"; // Seu e-mail
$mail->FromName = "Sac Eternit"; // Seu nome

// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress("sac@eternit.com.br");

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Atendimento ao Cliente - Eternit"; // Assunto da mensagem
$mail->Body = $html;

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=


try {
    // Envia o e-mail
    $enviado = $mail->Send();
} catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
}


//fale-conosco/atendimento-ao-cliente?duvidatecnica(variacoes)-produto(atendimento)-enviado

// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
return $enviado;
redir("fale-conosco/atendimento-ao-cliente?".$_GET['tipo_assistencia']."-".$_GET['change-form']."-enviado");
die();