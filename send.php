<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

if (isset($_POST['subject']) && !empty($_POST['subject'])) {
    $subject = $_POST['subject'];
}

if (isset($_POST['message']) && !empty($_POST['message'])) {
    $message = $_POST['message'];
}

$mail = new PHPMailer(true);

//Server settings                     //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host = 'localhost';
$mail->Port = 25;

$mail->SMTPAuth = false; 
$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;

//Recipients
$mail->setFrom('contato@trismegistuscapital.com', 'Site Trismegistus');
$mail->addAddress('contato@trismegistuscapital.com', 'Contato');

$mail->isHTML(true);

$mail->Subject = utf8_decode($subject);
$mail->Body = utf8_decode(nl2br($message));
$mail->AltBody = utf8_decode(nl2br(strip_tags($message)));

$mail->send();
