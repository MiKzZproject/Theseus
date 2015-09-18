<?php

header('Content-Type: application/json; charset=UTF-8');
require '../../vendor/autoload.php';
$db = \config\Db::getInstance();
$controlClient = new control\ControlClient($db);
session_start();
/** @var $client \model\Client */
$client = $_SESSION['login'];
$errors = false;
if (empty($_POST['nom']) ){
    $errors['nom'] = true;
} if (empty($_POST['prenom'])) {
    $errors['prenom'] = true;
} if (empty ($_POST['tel'])) {
    $errors['tel'] = true;
} if (empty ($_POST['date'])) {
    $errors['date'] = true;
} if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = true;
} else if ($client->getEmail() != $_POST['email'] && $controlClient->getClientByMail($_POST['email'])) {
    $errors['loginTaken'] = true;
}

if (!$errors) {
    $client->setNom($_POST['nom']);
    $client->setPrenom($_POST['prenom']);
    $client->setTel($_POST['tel']);
    $date = preg_split ("/-/",$_POST['date']);
    $date = $date[2]."-".$date[1]."-".$date[0];
    $client->setDateNaissance($date);
    if ($client->getEmail() != $_POST['email'] && $client->getNewsletters() == true) {
        $controlNewsletter = new control\ControlNewsletter($db);
        $newsletter = $controlNewsletter->getNewslettersByEmail($client->getEmail());
        $newsletter->setMail($_POST['email']);
        $controlNewsletter->updateNewsletter($newsletter);
    }
    $client->setEmail($_POST['email']);

    $controlClient->updateClient($client);

    $response = json_encode(['type' => 'ok']);
    echo $response;
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
