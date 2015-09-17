<?php
require('../config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);

$array = json_decode($_POST['donnees'], true);
$controlAdmin->deleteAdmin($array['id']);
?>
<div class="alert alert-info" role="alert">Suppression effectué</div>
<script>adminListe()</script>