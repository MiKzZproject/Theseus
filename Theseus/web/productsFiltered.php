<?php

require '../../vendor/autoload.php';

$db = \config\Db::getInstance();
$controlProduits = new control\ControlProduit($db);

$perPage = 9;
$page = isset($_GET['pf']) ? $_GET['pf'] : 1;

$produits = $controlProduits->getProduitsByCategorie($_POST['categorie'], $perPage, $page-1);
$produitsCount = $controlProduits->getProduitsCount($_POST['categorie']);
$nbPage = ceil($produitsCount/$perPage);

$controlCategorie = new control\ControlCategorie($db);
$categories = $controlCategorie->getCategories();

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
    <div class="paginationProduct">
<!--        affichage pagination-->
        <nav>
            <ul class="pager">
                <li class="previous <?php if($page == 1) echo "disabled"; ?>"><a href="<?php if($page == 1) { echo "#"; } else { echo "productsFiltered.php?pf=".($page-1); } ?>">Previous</a></li>
                <li class="active"><a><?php echo $page ?></a></li>
                <li class="next <?php if($page == $nbPage) echo "disabled"; ?>"><a href="<?php if($page == $nbPage) { echo "#"; } else { echo "productsFiltered.php?pf=".($page+1); } ?>">Next</a></li>
            </ul>
        </nav>
<!--        // fin pagination-->
    </div>
<?php } ?>
<script src="js/script.js"></script>
