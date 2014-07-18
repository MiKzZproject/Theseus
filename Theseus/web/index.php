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


