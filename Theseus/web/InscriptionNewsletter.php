<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/08/2015
 * Time: 14:57
 */

require '../../vendor/autoload.php';
require_once "config/config.php";

$controlNewsletter = new \control\ControlNewsletter($bdd);
$newsletters = $controlNewsletter->getNewsletters();

$newsletter = new \model\Newsletter(array(
    "mail" => $_POST['mail']
));

var_dump($controlNewsletter->addNewsletter($newsletter));