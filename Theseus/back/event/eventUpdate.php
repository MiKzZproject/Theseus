<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);

$array = json_decode($_POST['donnees'], true);

$event = $controlEvent->getEvenement($array['id']);


?>

Libelle : <br>
<input id="libelle2" class="form-control" type="text" value="<?php echo $event->getLibelle(); ?>"><br><br>
Lieu : <br>
<input id="lieu2" class="form-control" type="text" value="<?php echo $event->getLieu(); ?>"><br><br>
Description : <br>
<input id="description2" class="form-control" type="text" value="<?php echo $event->getDescription(); ?>"><br><br>
Adresse : <br>
<input id="adresse2" class="form-control" type="text" value="<?php echo $event->getAdresse(); ?>"><br><br>
Code postal : <br>
<input id="cp2" class="form-control" type="text" value="<?php echo $event->getCp(); ?>"><br><br>
Ville : <br>
<input id="ville2" class="form-control" type="text" value="<?php echo $event->getVille(); ?>"><br><br>
Date de début : <br>
<input id="dateDebut2" class="form-control" type="datetime-local" value="<?php echo date('Y-m-d',strtotime($event->getDateDebut())).'T'.date('H:i',strtotime($event->getDateDebut())); ?>"><br><br>
Date de fin  : <br>
<input id="dateFin2" class="form-control" type="datetime-local" value="<?php echo date('Y-m-d',strtotime($event->getDateFin())).'T'.date('H:i',strtotime($event->getDateFin())); ?>"><br><br>
Place <disponible></disponible>: <br>
<input id="place2" class="form-control" type="text" value="<?php echo $event->getPlace(); ?>"><br><br>
Image : <br>
<input id="image2" class="form-control" type="text" value="<?php echo $event->getImage(); ?>"><br><br>
Theme <disponible></disponible>: <br>
<input id="theme2" class="form-control" type="text" value="<?php echo $event->getTheme(); ?>"><br><br>
Miniature : <br>
<input id="miniature12" class="form-control" type="text" value="<?php echo $event->getMiniature1(); ?>"><br><br>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
    <button type="button" onclick="eventUpdateValid('<?php echo $event->getId(); ?>')" class="btn btn-primary" data-dismiss="modal">Modifier l'évenement</button>
</div>