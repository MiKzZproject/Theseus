<?php

require '../../vendor/autoload.php';
$db = \config\Db::getInstance();
$controlClient = new control\ControlClient($db);

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
} else if ($controlClient->getClientByMail($_POST['email'])) {
    $errors['loginTaken'] = true;
}

if (!$errors) {
    $controlNewsletter = new control\ControlNewsletter($db);
    $hasSubscribeNewsletter = $controlNewsletter->getNewslettersByEmail($_POST['email']);
    $newsletter = false;
    $alerte = false;
    if(isset($_POST['newsletter']) && $hasSubscribeNewsletter == false){
        $newsletter = new \model\Newsletter(array(
            "mail" => $_POST['email']
        ));
        $controlNewsletter->addNewsletter($newsletter);
        $newsletter = true;
    } if(isset($_POST['newsletter']) && $hasSubscribeNewsletter == true){
        $newsletter = true;
    } if(!isset($_POST['newsletter']) && $hasSubscribeNewsletter == true) {
        $controlNewsletter->deleteNewsletterByEmail($_POST['email']);
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


    $controlClient = new control\ControlClient($db);
    $result = $controlClient->addClient($client);

    $response = json_encode(['type' => $result]);
    echo $response;
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode($errors);
}
return false;
