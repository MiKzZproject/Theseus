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
} if (empty($_POST['pwd'])) {
    $errors['pwd'] = true;
} if ($_POST['pwd'] != $_POST['pwd2']) {
    $errors['pwd2'] = true;
} if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = true;
}

if (!$errors) {
    require '../../vendor/autoload.php';
    require_once "config/config.php";

    $newsletter = false;
    $alerte = false;
    if(isset($_POST['newsletter'])){
        $newsletter = true;
    }
    if(isset($_POST['alerte'])){
        $alerte = true;
    }

    $client = new \model\Client(array(
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "dateNaissance" => $_POST['date'],
        "tel" => $_POST['tel'],
        "email" => $_POST['email'],
        "pwd" => $_POST['pwd'],
        "newsletter" => $newsletter,
        "alerte" => $alerte
    ));

    $factoryClient = new control\FactoryClient($bdd);
    $result = ($factoryClient->addClient($client));

    $response = json_encode(['type' => 'ok']);
    echo $response;
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
?>