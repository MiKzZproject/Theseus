<?php

header('Content-Type: application/json; charset=UTF-8');

require '../../vendor/autoload.php';
session_start();

$db = \config\Db::getInstance();
/** @var $client \model\Client */
$client = $_SESSION['login'];
$controlNewsletter = new control\ControlNewsletter($db);
$newsletter = false;
$alerte = false;
if(isset($_POST['newsletter'])){
    $newsletter = new \model\Newsletter(array(
        "mail" => $client->getEmail()
    ));
    $controlNewsletter->addNewsletter($newsletter);
    $newsletter = true;
} else {
    $controlNewsletter->deleteNewsletterByEmail($client->getEmail());
}
if(isset($_POST['alerte'])){
    $alerte = true;
}


$client->setAlerte($alerte);
$client->setNewsletters($newsletter);

$controlClient = new control\ControlClient($db);
$controlClient->updateClient($client);

$response = json_encode(['type' => 'ok']);
echo $response;

return false;
