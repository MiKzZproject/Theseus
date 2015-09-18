<?php
require('../config/config.php');
$controlEvent = new \control\ControlEvenement($bdd);

$array = json_decode($_POST['donnees'], true);

$events = $controlEvent->getEventsOpt($array['value'],$array['type']);
if($events){
?>

<table class="table table-striped">
        <tr>
            <td>Image</td>
            <td>Libelle</td>
            <td>Lieu</td>
            <td>Date de Début/td>
            <td>Date de fin</td>
            <td>Place</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php
    foreach($events as $event){
        ?>
        <tr>
            <td><img src="../web/<?php echo $event->getImage() ?>" style="width:150px"></td>
            <td><?php echo $event->getLibelle() ?></td>
            <td><?php echo $event->getLieu() ?></td>
            <td><?php echo $event->getDateDebut() ?></td>
            <td><?php echo $event->getDateFin() ?></td>
            <td><?php echo $event->getPlace() ?></td>
            <td ><span style="color:purple" class="glyphicon glyphicon-gift click" aria-hidden="true" data-toggle="modal" data-target="#modalEventProduit" onclick="eventTirage('<?php echo $event->getId() ?>')"></span></td>
            <td ><span style="color:green" class="glyphicon glyphicon-th click" aria-hidden="true" data-toggle="modal" data-target="#modalEventProduit" onclick="eventProduit('<?php echo $event->getId() ?>')"></span></td>
            <td ><span style="color:blue" class="glyphicon glyphicon-user click" aria-hidden="true" data-toggle="modal" data-target="#modalEventClient" onclick="eventClient('<?php echo $event->getId() ?>')"></span></td>
            <td ><span style="color:orange" class="glyphicon glyphicon-edit click" aria-hidden="true" data-toggle="modal" data-target="#modalUpdateEvent" onclick="eventUpdate('<?php echo $event->getId() ?>')"></span></td>
            <td><span style="color:red" class="glyphicon glyphicon-remove click" aria-hidden="true" onclick="eventDelete('<?php echo $event->getId() ?>')"></span></td>

        </tr>
        <?php
    }
    ?>
</table>
    <?php
}else{
    ?>
        <div class="alert alert-warning" role="alert">Pas de résultat pour cette recherche.</div>
<?php
}