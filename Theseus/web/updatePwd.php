<?php
header('Content-Type: application/json; charset=UTF-8');
$errors = false;
if (empty($_POST['pwdAcutel']) ){
    $errors['pwdActuel'] = true;
} if (empty($_POST['pwd'])) {
    $errors['pwd'] = true;
} if ($_POST['pwd'] != $_POST['pwd2']) {
    $errors['pwd2'] = true;
}

if (!$errors) {
    require '../../vendor/autoload.php';
    session_start();
    /** @var $client \model\Client */
    $client = $_SESSION['login'];

    if($_POST['pwdAcutel'] == $client->getPwd()) {
        $client->setPwd($_POST['pwd']);

        $db = \config\Db::getInstance();
        $controlClient = new control\ControlClient($db);
        $controlClient->updateClient($client);

        $response = json_encode(['type' => 'ok']);
        echo $response;
    } else {
        $errors['pwdAcutel'] = true;
    }
}

if ($errors) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
