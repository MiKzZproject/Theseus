<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/08/2015
 * Time: 14:57
 */

header('Content-Type: application/json; charset=UTF-8');
if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('type' => 'error'));
    return false;
}

require '../../vendor/autoload.php';
require_once "config/config.php";

$controlNewsletter = new \control\ControlNewsletter($bdd);
$newsletters = $controlNewsletter->getNewsletters();


$newsletter = new \model\Newsletter(array(
    "mail" => $_POST['mail']
));

$result = ($controlNewsletter->addNewsletter($newsletter));
if($result) {
    $response = json_encode(['type' => 'ok','response' => 'new']);
} else {
    $response = json_encode(['type' => 'ok','response' => 'already']);
}

echo $response;