<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 14:10
 */
require '../../vendor/autoload.php';
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=theseus', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

session_start();
?>