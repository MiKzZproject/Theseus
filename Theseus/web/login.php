<?php

header('Content-Type: application/json; charset=UTF-8');
$errors = false;
} if (empty($_POST['pwd'])) {
    $errors['pass'] = true;
} if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['login'] = true;
}

$controlLogin = new \control\ControlClient(\config\Db::getInstance());

if(!$errors){
    require '../../vendor/autoload.php';

    $array = array(
        "login" => $_POST['login'],
        "pass" => $_POST['password'],
    );
    $client = $controlLogin->connection($array);
    if($client){
        $session = $controlLogin->isLogged($client->getId());
        $_SESSION['login'] = $session;
    } else{
        ?>
        <p class="bg-warning"><br>Le login / Password n'existe pas !<br><br></p><br><br>
        <?php
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
?>