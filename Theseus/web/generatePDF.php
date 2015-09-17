<?php
require '../../vendor/autoload.php';
session_start();

$db = \config\Db::getInstance();
$controlClient = new control\ControlClient($db);
/** @var $client \model\Client */
$client = $_SESSION['login'];


/** @var $commande \model\Commande */
$commande = $controlClient->getCommande($_GET['idCommande'], $client->getId());




$data= [];
$data['nom'] = $client->getNom();
$data['prenom'] = $client->getPrenom();
$data['datetime'] = strtotime($commande->getDateCommande());
$data['amount'] = $commande->getTotal();
$data['libelleProduct'] = $commande->getLibelleProduit();
$data['ref_transaction'] = $commande->getId();
$facture = new \Facture\models\Facture();
$facture->generatePDF($data);