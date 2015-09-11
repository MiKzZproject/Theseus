<?php
session_start();

header('Content-Type: application/json; charset=UTF-8');
$errors = false;

if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $errors['mail'] = true;
}

if(!$errors){
    require '../../vendor/autoload.php';
    $controlLogin = new \control\ControlClient(\config\Db::getInstance());
    if ($client = $controlLogin->getClientByMail($_POST['mail'])) {
        $to = $_POST['mail'];
        $subject = "Theseus - Mot de passe oublié";
        $message = file_get_contents('template/mail/forgotPasswordMail.html');
        $message = str_replace('[nom du client]', $client->getNom(), $message);
        $message = str_replace('[login]', $client->getEmail(), $message);
        $message = str_replace('[password]', $client->getPwd(), $message);
        $headers = "From: website.theseus@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to,$subject,$message,$headers);
    }
    $response = json_encode(['type' => 'ok']);
    echo $response;

} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
?>