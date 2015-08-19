<?php

header('Content-Type: application/json; charset=UTF-8');
$error = false;
if (!isset($_POST['nom'])){
    $error = ['nom' => true];
} if (!isset($_POST['prenom'])) {
    $error[] = ['nom' => true];
} if (!isset ($_POST['tel'])) {
    $error[] = ['nom' => true];
} if (!isset($_POST['pwd']) && !isset($_POST['pwd2'])) {
    $error[] = ['pwd' => true];
} elseif ($_POST['pwd'] != $_POST['pwd2']) {
    $error[] = ['pwd2' => true];
} if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error[] = ['email' => true];
}

if (!$error) {
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
        "dateNaissance" => $_POST['dateNaissance'],
        "tel" => $_POST['tel'],
        "email" => $_POST['email'],
        "pwd" => $_POST['pwd'],
        "newsletter" => $newsletter,
        "alerte" => $alerte
    ));

    $factoryClient = new factory\FactoryClient($bdd);
    $result = ($factoryClient->addClient($client));

    $response = json_encode(['type' => 'ok']);
    echo $response;
} else {
    header('HTTP/1.1 400 Bad Request');
    $error [] = array('type' => 'error');
    echo json_encode($error);
}
return false;
?>