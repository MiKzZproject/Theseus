<?php

require '../../vendor/autoload.php';

$db = \config\Db::getInstance();
$controlProduits = new control\ControlProduit($db);

$perPage = \config\Theseus::NBPERPAGEPRODUCT;
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$cat = isset($_POST['categorie']) ? $_POST['categorie'] : 'all';

$produits = $controlProduits->getProduitsByCategorie($cat, $perPage, $page);
$produitsCount = $controlProduits->getProduitsCount($cat);
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
            if($categorie->getId() == $cat) {
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
            <ul class="pager" id="pagination">
                <li data-page="prev" class="previous <?php if($page == 1) echo "disabled"; ?>"><a href>Previous</a></li>
                <li id="currentPage" class="active" data-nbpage="<?php echo $nbPage ?>" data-page="<?php echo $page ?>"><a><?php echo $page ?></a></li>
                <li data-page="next "class="next <?php if($page == $nbPage) echo "disabled"; ?>"><a href>Next</a></li>
            </ul>
        </nav>
<!--        // fin pagination-->
    </div>
<?php } ?>
<script src="js/script.js"></script>
