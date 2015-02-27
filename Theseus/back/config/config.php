<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 14:10
 */

define("PROJET", "C:\\wamp\\www\\Theseus\\");

require PROJET.'vendor/autoload.php';
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=theseus', 'root', '', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

session_start();
?>