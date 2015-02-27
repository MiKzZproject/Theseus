<?php
    require('config/config.php');
$controlEvenement = new \control\ControlEvenement($bdd);
$evenements = $controlEvenement->getEvenements();
?>
<h3>Gestion des Evenements</h3><br><br>

<button class="btn btn-success" data-toggle="modal" data-target="#addProduitModal">Ajouter un Evenements</button><br><br>

<div class="block_recherche">
    <input id="produit_recherche" class="form-control" type="text" placeholder="Recherche">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    <select id="produit_recherche_type" class="form-control">
        <option value="libelle">Libelle</option>
        <option value="marque">date</option>
    </select>
    <br><br>
</div>
<table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Libelle</td>
            <td>Description</td>
            <td>Adresse</td>
            <td>Cp</td>
            <td>Ville</td>
            <td>DateDebut</td>
            <td>DateFin</td>
            <td>Places</td>
        </tr>
        <?php
        foreach($evenements as $evenement){
            ?>
            <tr>
                <td><?php echo $evenement->getId(); ?></td>
                <td><?php echo $evenement->getLibelle(); ?></td>
                <td><?php echo $evenement->getDescription(); ?></td>
                <td><?php echo $evenement->getAdresse(); ?></td>
                <td><?php echo $evenement->getCp(); ?></td>
                <td><?php echo $evenement->getVille(); ?></td>
                <td><?php echo $evenement->getDateDebut(); ?></td>
                <td><?php echo $evenement->getDateFin(); ?></td>
                <td><?php echo $evenement->getPlaces(); ?></td>
                <td><span style="color:orange" class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
                <td><span style="color:red" class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>

            </tr>
            <?php
        }
        ?>
</table>

<!-- Modal ADD PRODUIT -->
<div class="modal fade" id="addProduitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un nouveau Produit</h4>
            </div>
            <div class="modal-body">
                Libelle : <br>
                <input class="form-control" type="text"><br><br>
                Marque : <br>
                <input class="form-control" type="text"><br><br>
                Id de la catégorie : <br>
                <input class="form-control" type="text"><br><br>
                Description : <br>
                <input class="form-control" type="text"><br><br>
                Prix : <br>
                <input class="form-control" type="text"><br><br>
                Stock : <br>
                <input class="form-control" type="text"><br><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="addProduit" class="btn btn-primary">Ajouter le produit</button>
            </div>
        </div>
    </div>
</div>