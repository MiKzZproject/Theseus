<?php
require('../config/config.php');
$controlClient= new \control\ControlClient($bdd);

$array = json_decode($_POST['donnees'], true);

$client = new \model\Client($array);

$controlClient->updateClientAdmin($client);

?>
<div class="alert alert-success" role="alert">Le client a été modifié.</div>
<script>clientListe()</script>