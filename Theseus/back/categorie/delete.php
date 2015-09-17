<?php
require('../config/config.php');
$controlCategorie = new \control\ControlCategorie($bdd);

$array = json_decode($_POST['donnees'], true);

$controlCategorie->deleteCategorie($array['id']);
?>
<div class="alert alert-info" role="alert">Suppression effectué</div>
<script>categorieListe()</script>