<?php

require('../config/config.php');
//$_POST['donnees'] = array('idEvent' => 4);
//$array = json_decode($_POST['donnees'], true);
$controlClient = new \control\ControlClient($bdd);
$controlEvent = new \control\ControlEvenement($bdd);
$event = $controlEvent->getEvenement(4);
$inscrits = $controlEvent->getInvitations(4);
$tableau = [];

/** @var $inscrit \model\Inscrit */
foreach($inscrits as $inscrit) {
    for ($i = 0; $i < $inscrit->getRatio() ;$i++){
        $tableau[] = $inscrit->getIdClient();
    }
}

$nbEntries = Count($tableau);
for ($i = 0; $i < $event->getPlace() ;$i++){
    $luck = $tableau[rand(0,$nbEntries-1)];
}

var_dump($tableau);
var_dump($luck);
