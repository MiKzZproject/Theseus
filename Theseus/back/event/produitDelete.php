<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);

$array = json_decode($_POST['donnees'], true);

$controlEvent->produitDelete($array['idEvent'],$array['idProduit']);
?>
<div class="alert alert-info" role="alert">Supression du produit effectué</div>
<script>eventProduit('<?php echo $array['idEvent'] ?>')</script>