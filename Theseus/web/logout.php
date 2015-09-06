<?php

require '../../vendor/autoload.php';
session_start();

$controlLogout = new \control\ControlClient(\config\Db::getInstance());
$controlLogout->deconnection();
return false;