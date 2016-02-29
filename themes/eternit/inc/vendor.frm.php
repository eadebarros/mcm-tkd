<?php
$Vendor = new Vendor();
$Vendor->loadForm();
$Vendor->insert();

include 'inc/phpmailer/class.phpmailer.php';

//include body
include $ThemePath.'inc/email/vendor.mail.php';

$mail = new PHPMailer();

// Define os dados do servidor e tipo de conex�o
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
/*$mail->IsSMTP(); // Define que a mensagem ser� SMTP
$mail->Host = "smtp.office365.com"; // Endere�o do servidor SMTP
$mail->Port = 587;
$mail->SMTPAuth = true; // Usa autentica��o SMTP? (opcional)
$mail->Username = 'mkt@saphyr.com.br'; // Usu�rio do servidor SMTP
$mail->Password = ''; // Senha do servidor SMTP
$mail->SMTPSecure = 'tls';*/

//$mail->Host = "localhost"; // Endere�o do servidor SMTP
//$mail->Port = 25;

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
if($_POST['ser'] === "fornecedor") {
    $mail->From = "suprimentos@eternit.com.br"; // Seu e-mail
} else
if($_POST['ser'] === "cliente") {
    $mail->From = "sac@eternit.com.br"; // Seu e-mail
}
$mail->FromName = "Suprimentos Eternit"; // Seu nome

// Define os destinat�rio(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
if($_POST['ser'] === "fornecedor") {
    $mail->AddAddress("suprimentos@eternit.com.br");
} else
if($_POST['ser'] === "cliente") {
    $mail->AddAddress("sac@eternit.com.br");
}

// Define os dados t�cnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
if($_POST['ser'] === "fornecedor") {
    $mail->Subject  = "Seja nosso fornecedor - Eternit"; // Assunto da mensagem
} else
if($_POST['ser'] === "cliente") {
    $mail->Subject  = "Seja nosso cliente - Eternit"; // Assunto da mensagem
}
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

// Limpa os destinat�rios e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
return $enviado;