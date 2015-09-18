<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);


$array = json_decode($_POST['donnees'], true);
$event = new \model\Evenement($array);

$controlEvent->addEventProduit($array['idEvent'],$array['idProduit']);

?>
<div class="alert alert-success" role="alert">L'évement a été associé.</div>
<script>eventProduit('<?php echo $array['idEvent']?>');</script>