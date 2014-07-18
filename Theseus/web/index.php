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
use control\Control;

$array = ["nom"=>"sususususuus",
    "prenom"=>"sususususuus",
    "dateNaissance"=>"10/10/2014",
    "adresse"=>"sususususuus",
    "cp" => 2,
];

$client = new client($array);
$Control = new Control($bdd);

$test = $Control->add($client);

var_dump($test);

