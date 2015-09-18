<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);


$array = json_decode($_POST['donnees'], true);

$controlEvent->addEventClient($array['idEvent'],$array['idClient']);

?>
<div class="alert alert-success" role="alert">L'évement a été associé.</div>
<script>eventClient('<?php echo $array['idEvent']?>');</script>