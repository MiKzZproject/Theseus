<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 14:10
 */

define("PROJET", "C:\\wamp\\www\\Theseus\\");

require PROJET.'vendor/autoload.php';
$bdd = \config\Db::getInstance();

session_start();
?>