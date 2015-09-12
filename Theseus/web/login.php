<?php
session_start();

header('Content-Type: application/json; charset=UTF-8');
$errors = false;

if (empty($_POST['pwd'])) {
    $errors['pass'] = true;
} if (!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
    $errors['login'] = true;
}

if(!$errors){
    require '../../vendor/autoload.php';
    $controlLogin = new \control\ControlClient(\config\Db::getInstance());

    $array = array(
        "login" => $_POST['login'],
        "pass" => $_POST['pwd'],
    );
    $client = $controlLogin->connection($array);
    if($client){
        $_SESSION['login'] = $client;
        $session = $controlLogin->isLogged();
        $response = json_encode(['type' => 'ok', 'login' => ucfirst($client->getNom())]);
        echo $response;
    } else{
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['wrong' => true]);
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
