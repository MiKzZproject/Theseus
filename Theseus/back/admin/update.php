<?php
require('../config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);

$array = json_decode($_POST['donnees'], true);
$admin = new \model\Admin($array);

$controlAdmin->updateAdmin($admin);


?>
<div class="alert alert-success" role="alert">L'admin a été modifié.</div>
<script>adminListe()</script>