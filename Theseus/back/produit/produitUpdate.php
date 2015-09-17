<?php
require('../config/config.php');
$controlProduit = new \control\ControlProduit($bdd);
$controlCat = new \control\ControlCategorie($bdd);

$array = json_decode($_POST['donnees'], true);

$produit = $controlProduit->getProduitId($array['id']);
$cats = $controlCat->getCategories();


?>

Libelle : <br>
<input id="libelle2" class="form-control" type="text" value="<?php echo $produit->getLibelle(); ?>"><br><br>
Marque : <br>
<input id="marque2" class="form-control" type="text" value="<?php echo $produit->getMarque(); ?>"><br><br>
Modele : <br>
<input id="modele2" class="form-control" type="text" value="<?php echo $produit->getModele(); ?>"><br><br>
Catégorie : <br>
<select class="form-control" id="categorie2">
    <?php
    foreach($cats as $cat){
        ?>
        <option value="<?php echo $cat->getId(); ?>"><?php echo $cat->getNom(); ?></option>
    <?php
    }
    ?>
</select><br><br>
Description : <br>
<input id="desc2" class="form-control" type="text" value="<?php echo $produit->getDescription() ?>"><br><br>
Prix : <br>
<input id="prix2" class="form-control" type="text" value="<?php echo $produit->getPrix() ?>"><br><br>
Stock : <br>
<input id="stock2" class="form-control" type="text" value="<?php echo $produit->getStock() ?>"><br><br>
image : <br>
<input id="image2" class="form-control" type="text" value="<?php echo $produit->getImage() ?>"><br><br>
miniature : <br>
<input id="miniature2" class="form-control" type="text" value="<?php echo $produit->getMiniature() ?>"><br><br>
Nombre ventes: <br>
<input id="nbVentes2" class="form-control" type="text" value="<?php echo $produit->getNbVentes() ?>"><br><br>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
    <button type="button" onclick="produitUpdateValid('<?php echo $produit->getId(); ?>')" class="btn btn-primary" data-dismiss="modal">Modifier le produit</button>
</div>