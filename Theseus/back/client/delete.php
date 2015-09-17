<?php
require('../config/config.php');
$controlClient = new \control\ControlClient($bdd);

$array = json_decode($_POST['donnees'], true);

$controlClient->deleteClient($array['id']);
?>
<div class="alert alert-info" role="alert">Supréssion du Client effectué</div>
<script>clientListe()</script>