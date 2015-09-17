<?php
require('../config/config.php');
$controlCat = new \control\ControlCategorie($bdd);

$array = json_decode($_POST['donnees'], true);
$categorie = new \model\Categorie($array);

$controlCat->updateCategorie($categorie);

?>
<div class="alert alert-success" role="alert">La catégorie a été modifié.</div>
<script>categorieListe()</script>