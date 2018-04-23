<?php
require_once("config.php");
require_once("PHPMailer.php");
require_once("SMTP.php");
require_once("Exception.php");
require_once("POP3.php");
require_once("OAuth.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->SMTPOptions = array(
   'ssl' => array(
     'verify_peer' => false,
     'verify_peer_name' => false,
     'allow_self_signed' => true
    )
);
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->IsHTML(true);
$mail->SMTPSecure = 'tls';
$mail->Username = "ccarrster@gmail.com";
$mail->Password = $emailPassword;
$mail->setFrom('ccarrster@gmail.com', 'STEAM Team');
$mail->addAddress('ccarrster@gmail.com', 'STEAM Team');
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->msgHTML("<html><body><div>".$_GET["email"]."</div><div>".$_GET["message"]."</div></body></html>");
if (!$mail->send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message sent!";
}


?>