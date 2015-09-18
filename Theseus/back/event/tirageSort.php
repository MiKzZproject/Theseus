<?php

require('../config/config.php');
//$_POST['donnees'] = array('idEvent' => 4);
//$array = json_decode($_POST['donnees'], true);
$controlClient = new \control\ControlClient($bdd);
$controlEvent = new \control\ControlEvenement($bdd);
$event = $controlEvent->getEvenement(4);
$inscrits = $controlEvent->getInvitations(4);
$tableau = [];
$luck = [];

if($inscrits) {
    /** @var $inscrit \model\Inscrit */
    foreach($inscrits as $inscrit) {
        for ($i = 0; $i < $inscrit->getRatio() ;$i++){
            $tableau[] = $inscrit->getIdClient();
        }
    }

    for ($i = 0; $i < $event->getPlace() ;$i++){
        if (empty($tableau)) {
            break;
        }
        $nbEntries = Count($tableau);
        $random = rand(0,$nbEntries-1);
        $idClient = $tableau[$random];
        $luck[] = $idClient;
        $controlEvent->updateEventClient(4,$idClient);
        $client = $controlClient->getClientById($idClient);
        $client->setRatio($client->getRatio()-1);
        $controlClient->updateClient($client);
        unset($tableau[$random]);
        $tableau = array_values($tableau);
    }

    foreach ($tableau as $id) {
        $client = $controlClient->getClientById($id);
        $client->setRatio($client->getRatio()+1);
        $controlClient->updateClient($client);
    }
}

