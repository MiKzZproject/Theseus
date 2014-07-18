<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

require '../../vendor/autoload.php';
require_once "config/config.php";

use model\Client;
use control\ControlClient;

$array = ["nom"=>"sususususuus",
    "prenom"=>"sususususuus",
    "dateNaissance"=>"10/10/2014",
    "adresse"=>"sususususuus",
    "cp" => 2,
];

$client = new client($array);
$Controlclient = new ControlClient($bdd);

$test = $Controlclient->add($client);

var_dump($test);







use model\Produit;
use control\ControlProduit;


$array = [
    "id" => 8,
    "marque" => "aaa",
];

$produit = new \model\Produit($array);
var_dump($produit);
$controlProduit = new ControlProduit($bdd);
$test2 = $controlProduit->add($produit);


var_dump($test2);