<?php
require('../config/config.php');
$controlClient = new \control\ControlClient($bdd);

$array = json_decode($_POST['donnees'], true);

$clients = $controlClient->getClientsOpt($array['value'],$array['type']);

if($clients){
?>

<table class="table table-striped">
        <tr>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Email</td>
            <td>Ratio</td>
            <td>Date fin abonnement</td>
            <td></td>
            <td></td>
        </tr>
<?php
    /** @var  $client  \model\Client */

    foreach($clients as $client){
        ?>
        <tr>
            <td><?php echo $client->getNom() ?></td>
            <td><?php echo $client->getPrenom() ?></td>
            <td><?php echo $client->getEmail() ?></td>
            <td><?php echo $client->getRatio() ?></td>
            <td><?php echo $client->getDateFinAbo() ?></td>
            <td ><span style="color:orange" class="glyphicon glyphicon-edit click" aria-hidden="true" data-toggle="modal" data-target="#modalUpdateClient" onclick="clientUpdate('<?php echo $client->getId() ?>')"></span></td>
            <td><span style="color:red" class="glyphicon glyphicon-remove click" aria-hidden="true" onclick="clientDelete('<?php echo $client->getId() ?>')"></span></td>

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