<?php
require('../config/config.php');
$controlProduit = new \control\ControlProduit($bdd);

$array = json_decode($_POST['donnees'], true);

$controlProduit->deleteProduit($array['id']);
?>
<div class="alert alert-info" role="alert">Suppression effectué</div>
<script>produitListe()</script>