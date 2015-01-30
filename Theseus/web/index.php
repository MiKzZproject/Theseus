<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

require '../../vendor/autoload.php';
require_once "config/config.php";

use model\Produit;

$array = array(
    "id" => "1",
    "idFournisseur" => "1",
    "marque" => "sdfsdfsdf",
    "marque" => "sdfsdfsdf",
    "type" => "sdfsdfsdf",
    "modele" => "sdfsdfsdf",
    "libelle" => "dfgdfg",
    "description" => "sdfsdfsdf",
    "prix" => "sdfsddfgdfgdfgfsdf",
    "stock" => "sdfsdfgdfgdfdfgdfsdf",

);
$fourn= new Produit($array);


var_dump($fourn);