<?php
    require('config/config.php');
$controlProduit = new \control\ControlProduit($bdd);
$controlCat = new \control\ControlCategorie($bdd);
$produits = $controlProduit->getProduits();
$cats = $controlCat->getCategories();
?>
<h3>Gestion des produits</h3><br><br>

<button class="btn btn-success" data-toggle="modal" data-target="#addProduitModal">Ajouter un produit</button><br><br>

<div class="block_recherche">
    <input id="produit_recherche" class="form-control" type="text" placeholder="Recherche">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    <select id="produit_recherche_type" class="form-control">
        <option value="0">Libelle</option>
        <option value="1">Marque</option>
    </select>
    <br><br>
</div>
    <span id="produitResult"></span>
    <span id="produitListe"></span>

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
                <input id="libelle" class="form-control" type="text"><br><br>
                Marque : <br>
                <input id="marque" class="form-control" type="text"><br><br>
                Modele : <br>
                <input id="modele" class="form-control" type="text"><br><br>
                Catégorie : <br>
                <select class="form-control" id="categorie">
                    <?php
                    foreach($cats as $cat){
                        ?>
                        <option value="<?php echo $cat->getId(); ?>"><?php echo $cat->getNom(); ?></option>
                    <?php
                    }
                    ?>
                </select><br><br>
                Description : <br>
                <input id="desc" class="form-control" type="text"><br><br>
                Prix : <br>
                <input id="prix" class="form-control" type="text"><br><br>
                Stock : <br>
                <input id="stock" class="form-control" type="text"><br><br>
                image : <br>
                <input id="image" class="form-control" type="text"><br><br>
                miniature : <br>
                <input id="miniature" class="form-control" type="text"><br><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="produitAdd()" class="btn btn-primary" data-dismiss="modal">Ajouter le produit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal ADD PRODUIT -->
<div class="modal fade" id="updateProduitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modification du Produit</h4>
            </div>
            <div class="modal-body">
                <span id="produitUpdate"></span>
            </div>

        </div>
    </div>
</div>
<script>
$('#produit_recherche,#produit_recherche_type').bind("change paste keyup", function() {
    produitListe();
});

produitListe()
</script>