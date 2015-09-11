<?php

header('Content-Type: application/json; charset=UTF-8');
require '../../vendor/autoload.php';
session_start();
$errors = false;
$db = \config\Db::getInstance();
$controlEvent = new control\ControlEvenement($db);
$controlClient = new \control\ControlClient($db);
$eventId = $_POST['idEvent'];
$errors['late'] = false;
$errors['notLogged'] = false;
if(!empty($eventId)) {
    $event = $controlEvent->getEvenement($eventId);
    $startDate = date_create($event->getDateDebut());
    $startDate = $startDate->getTimestamp();
    $result = time() > ($startDate - \config\Theseus::CLOSEINSCRIPTION);
    if ($result) {
        $errors['late'] = true;
    }
}
if(!$controlClient->isLogged()) {
    $errors['notLogged'] = true;
}

if( !$errors['notLogged'] && !empty($eventId) && !$errors['late']) {
    $client = $_SESSION['login'];
    $eventId = $_POST['idEvent'];

    $result = $controlEvent->inscriptionEvenement($eventId, $client);
    echo json_encode(['type' => $result, 'prenium' => $client->isPrenium()]);
} else {

    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
?>