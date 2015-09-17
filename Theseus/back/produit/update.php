<?php
require('../config/config.php');
$controlProduit = new \control\ControlProduit($bdd);
$controlCat = new \control\ControlCategorie($bdd);

$array = json_decode($_POST['donnees'], true);
$produit = new \model\Produit($array);

$controlProduit->updateProduit($produit);

?>
<div class="alert alert-success" role="alert">Le produit a été modifié.</div>
<script>produitListe()</script>