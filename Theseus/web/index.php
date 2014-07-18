<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

require '../../vendor/autoload.php';

use model\Client;

$array = [
    "id" => 8,
    "prenom" => "ta mere",
];

$test= new \model\Client($array);

var_dump($test);