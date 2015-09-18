<?php
require('../config/config.php');
$controlClient = new \control\ControlClient($bdd);

$array = json_decode($_POST['donnees'], true);

$clients = $controlClient->getClientByEvent($array['id']);
$allClients = $controlClient->getClients();

if($clients){
?>

<table class="table table-striped">
        <tr>
            <td>Nom</td>
            <td>Email</td>
            <td></td>
        </tr>
    <?php
    foreach($clients as $client){
        ?>
        <tr>
            <td><?php echo $client->getNom() ?></td>
            <td><?php echo $client->getEmail() ?></td>
            <td><span style="color:red" class="glyphicon glyphicon-remove click" aria-hidden="true" onclick="eventClientDelete('<?php echo $array['id']; ?>','<?php echo $client->getId(); ?>')"></span></td>

        </tr>
        <?php
    }
    ?>
</table>
    <select id="addClient" class="form-control">
        <?php foreach($allClients as $client){
        ?>
            <option value="<?php echo $client->getId(); ?>"><?php echo $client->getNom(); ?></option>
        <?php
        }
        ?>
    </select>
    <br><button class="btn">Associé le Client</button>
    <?php
}else{
    ?>
        <div class="alert alert-warning" role="alert">Pas de résultat pour cette recherche.</div>
<?php
}