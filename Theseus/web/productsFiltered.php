<?php

require '../../vendor/autoload.php';
require 'config/config.php';

$factoryProduits = new factory\FactoryProduit($bdd);
$produits = $factoryProduits->getProduitsByCategorie($_POST['categorie']);
$produitsCount = $factoryProduits->getProduitsByCategorieCount($_POST['categorie']);

$factoryCategorie = new factory\FactoryCategorie($bdd);
$categories = $factoryCategorie->getCategories();
?>
<div class="form-group" id="productfilter">
    <select id="selectcatprod" class="form-control">
        <option class='selectcat' value="all">Toutes les catégories</option>
        <?php
        foreach ($categories as $categorie ) {
            $selected = "";
            if($categorie->getId() == $_POST['categorie']) {
                $selected = "selected";
            }
            echo "<option class='selectcat' value='".$categorie->getId()."'".$selected.">".$categorie->getNom() ."</option>";
        }
        ?>
    </select>
</div>
<h1>Nos Produits</h1>
<?php if(empty($produits)) { ?>
    <div class="alert alert-info" role="alert"><p>Aucun produits ne correspond à votre recherche</p></div>
<?php } else { ?>
    <div id="tableproduct" >
        <?php foreach ($produits as $produit) {
            include 'template/product.php';
        } ?>
    </div>
<?php } ?>
<script src="js/script.js"></script>
