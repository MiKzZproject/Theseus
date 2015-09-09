<?php

header('Content-Type: application/json; charset=UTF-8');
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
}

if (!$errors) {
    require '../../vendor/autoload.php';
    session_start();
    $client = $_SESSION['login'];
    $client->setNom($_POST['nom']);
    $client->setPrenom($_POST['prenom']);
    $client->setTel($_POST['tel']);
    $client->setDateNaissance($_POST['date']);
    $client->setEmail($_POST['email']);

    $db = \config\Db::getInstance();
    $controlClient = new control\ControlClient($db);
    $controlClient->updateClient($client);

    $response = json_encode(['type' => 'ok']);
    echo $response;
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
?>