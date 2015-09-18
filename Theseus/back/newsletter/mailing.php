<?php
require('../config/config.php');

$controlNewsletter = new \control\ControlNewsletter($bdd);
$mails = $controlNewsletter->exportMail();
foreach($mails as $mail) {
    $to = $mail;
    $subject = "Theseus - Newsletter";
    $message = file_get_contents('../../web/template/mail/newsletterMail.html');
    $headers = "From: website.theseus@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to,$subject,$message,$headers);
}
?>
<div class="alert alert-info" role="alert">Envoie de la newsletter bien effectuer</div>
