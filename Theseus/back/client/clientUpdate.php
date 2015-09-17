<?php
require('../config/config.php');
$controlClient = new \control\ControlClient($bdd);

$array = json_decode($_POST['donnees'], true);

$client = $controlClient->getClientById($array['id']);


?>

Nom  <br>
<input id="nom" class="form-control" type="text" value="<?php echo $client->getNom(); ?>"><br><br>
Prénom <br>
<input id="prenom" class="form-control" type="text" value="<?php echo $client->getPrenom(); ?>"><br><br>
Date de Naissance <br>
<input id="dateNaissance" class="form-control" type="date" value="<?php echo date('Y-m-d',strtotime($client->getDateNaissance())); ?>"><br><br>
Telephone <br>
<input id="tel" class="form-control" type="tel" value="<?php echo $client->getTel(); ?>"><br><br>
Email <br>
<input id="email" class="form-control" type="text" value="<?php echo $client->getEmail(); ?>"><br><br>


dateDebut <br>
<input id="dateDebutAbo" class="form-control" type="datetime-local" value="<?php echo date('Y-m-d',strtotime($client->getDateDebutAbo())).'T'.date('H:i',strtotime($client->getDateDebutAbo())); ?>""><br><br>
dateFin br>
<input id="dateFinAbo" class="form-control" type="datetime-local" value="<?php echo date('Y-m-d',strtotime($client->getDateFinAbo())).'T'.date('H:i',strtotime($client->getDateFinAbo())); ?>"><br><br>
Ratio <br>
<input id="ratio" class="form-control" type="text" value="<?php echo $client->getRatio(); ?>"><br><br>
<table class="table">
    <tr>
        <td>
            Newsletters <br>
            <input id="newsletters"  type="checkbox" <?php if($client->getNewsletters()){echo "checked";} ?>><br><br>
        </td>
        <td>
            alerte <br>
            <input id="alerte"  type="checkbox" <?php if($client->getAlerte()){echo "checked";} ?>><br><br>
        </td>
    </tr>
</table>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onclick="clientUpdateValid('<?php echo $client->getId(); ?>')" class="btn btn-primary" data-dismiss="modal">Modifier le produit</button>
</div>