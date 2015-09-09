<?php

header('Content-Type: application/json; charset=UTF-8');

require '../../vendor/autoload.php';

$newsletter = false;
$alerte = false;
if(isset($_POST['newsletter'])){
    $newsletter = true;
}
if(isset($_POST['alerte'])){
    $alerte = true;
}

$client = $_SESSION['login'];
$client->setAlerte($alerte);
$client->setNewsletters($newsletter);

$db = \config\Db::getInstance();
$controlClient = new control\ControlClient($db);
$controlClient->updateClient($client);

$response = json_encode(['type' => 'ok']);
echo $response;

return false;
?>