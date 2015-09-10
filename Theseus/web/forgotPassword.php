<?php
session_start();

header('Content-Type: application/json; charset=UTF-8');
$errors = false;

if (!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
    $errors['login'] = true;
}

if(!$errors){
    require '../../vendor/autoload.php';
    $controlLogin = new \control\ControlClient(\config\Db::getInstance());
    if ($controlLogin->getClientByMail($_POST['login'])) {
        //envoie Email avec pwd
    }
    $response = json_encode(['type' => 'ok']);
    echo $response;

} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
?>