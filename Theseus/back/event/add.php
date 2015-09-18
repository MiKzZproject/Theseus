<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);


$array = json_decode($_POST['donnees'], true);
$event = new \model\Evenement($array);

$controlEvent->addEvenement($event);

?>
<div class="alert alert-success" role="alert">L'évement a été ajouté.</div>
<script>eventListe()</script>