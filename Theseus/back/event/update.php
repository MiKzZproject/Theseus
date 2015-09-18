<?php
require('../config/config.php');
$controlEvent= new \control\ControlEvenement($bdd);

$array = json_decode($_POST['donnees'], true);

$event = new \model\Evenement($array);

$controlEvent->updateEvenement($event);

?>
<div class="alert alert-success" role="alert">L'évemement a été modifié.</div>
<script>eventListe()</script>