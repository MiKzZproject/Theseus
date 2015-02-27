<?php
    require('config/config.php');
$controlProduit = new \control\ControlProduit($bdd);
$produits = $controlProduit->getProduits();
?>
<h3>Gestion des produits</h3><br><br>

<button class="btn btn-success" data-toggle="modal" data-target="#addProduitModal">Ajouter un produit</button><br><br>

<div class="block_recherche">
    <input id="produit_recherche" class="form-control" type="text" placeholder="Recherche">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    <select id="produit_recherche_type" class="form-control">
        <option value="libelle">Libelle</option>
        <option value="marque">Marque</option>
        <option value="marque">Category</option>
    </select>
    <br><br>
</div>
<table class="table table-striped">
        <tr>
            <td>id</td>
            <td>libelle</td>
            <td>marque</td>
            <td>categoryId</td>
            <td>description</td>
            <td>prix</td>
            <td>stock</td>
            <td></td>
            <td></td>
        </tr>
        <?php
        foreach($produits as $produit){
            ?>
            <tr>
                <td><?php echo $produit->getId(); ?></td>
                <td><?php echo $produit->getLibelle(); ?></td>
                <td><?php echo $produit->getMarque(); ?></td>
                <td><?php echo $produit->getCategoryId(); ?></td>
                <td><?php echo $produit->getDescription(); ?></td>
                <td><?php echo $produit->getPrix(); ?></td>
                <td><?php echo $produit->getStock(); ?></td>
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
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>