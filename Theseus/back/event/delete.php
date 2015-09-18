<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);

$array = json_decode($_POST['donnees'], true);

$controlEvent->deleteEvenement($array['id']);
?>
<div class="alert alert-info" role="alert">Supréssion de l'évènement effectué</div>
<script>eventListe()</script>