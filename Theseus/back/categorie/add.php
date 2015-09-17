<?php
require('../config/config.php');
$controlCategorie = new \control\ControlCategorie($bdd);
$controlCat = new \control\ControlCategorie($bdd);

$array = json_decode($_POST['donnees'], true);
$cat = new \model\Categorie($array);
$controlCategorie->addCategorie($cat);

?>
<div class="alert alert-success" role="alert">La catégorie a été ajouté.</div>
<script>categorieListe()</script>