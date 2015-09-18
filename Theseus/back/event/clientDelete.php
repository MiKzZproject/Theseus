<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);

$array = json_decode($_POST['donnees'], true);
var_dump($array);

$controlEvent->clientDelete($array['idEvent'],$array['idClient']);
?>
<div class="alert alert-info" role="alert">Supréssion du client effectué</div>
<script>eventClient('<?php echo $array['idEvent'] ?>')</script>