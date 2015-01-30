<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */
use model\Client;
require '../../vendor/autoload.php';
require_once "config/config.php";


$array = array("id" => 1,
    "idAdresse" => 1,
    "nom" => "toto",
    "prenom" => "trara",
    "dateNaissance" => time() ,
    "tel" => "44575",
    "email" => "dgdsfgsd",
    "pwd" => "dsfgdf",
    "dateInscription" => time(),
    "newsletters" => true,
    "alert" => true
    );
$client = new Client($array);



$array = array("id" => 1,
    "nom" => "toto",
    "idClient" => 1,
    "dateCommande" => time() ,
    "livrer" => true,

);

$commande = new \model\Commande($array);

var_dump($client);
var_dump($commande);



