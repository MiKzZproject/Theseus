<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

include 'template/header.php';
$db = \config\Db::getInstance();
$controlProduits = new control\ControlProduit($db);


// pagination
$page = isset($_GET['p']) ? $_GET['p'] : 1;
$perPage = 9;

$produits = $controlProduits->getProduitsPagination($page-1, $perPage);
$produitsCount = $controlProduits->getProduitsCount();
$nbPage = ceil($produitsCount/$perPage);
//

$controlCategories = new control\ControlCategorie($db);
$categories = $controlCategories->getCategories();

?>
<section id="product-content">
    <div class="form-group" id="productfilter">
        <select id="selectcatprod" class="form-control">
            <option class='selectcat' value="all" selected>Toutes les catégories</option>
            <?php
            foreach ($categories as $categorie ) {
                echo "<option class='selectcat' value='".$categorie->getId()."'>".$categorie->getNom() ."</option>";
            }
            ?>
        </select>
    </div>
<h1>Nos Produits</h1>

<?php
if(empty($produits)) {
    ?>
    <div class="alert alert-info" role="alert"><p>Aucun produits ne correspond à votre recherche</p></div>
<?php } else { ?>
    <div id="tableproduct" >
        <?php foreach ($produits as $produit) {
            include 'template/product.php';
       } ?>
        <div class="paginationProduct">
            <div class="paginationProduct">
                <!--        affichage pagination-->
                <nav>
                    <ul class="pager">
                        <li class="previous <?php if($page == 1)  echo "disabled"; ?>"><a href="<?php if($page == 1) { echo "#"; } else { echo "products.php?p=".($page-1); } ?>">Previous</a></li>
                        <li class="active"><a><?php echo $page ?></a></li>
                        <li class="next <?php if($page == $nbPage) echo "disabled"; ?>"><a href="<?php if($page == $nbPage) { echo "#"; } else { echo "products.php?p=".($page+1); } ?>">Next</a></li>
                    </ul>
                </nav>
                <!--        // fin pagination-->
            </div>
        </div>
    </div>
<?php } ?>
</section>
<?php
include 'template/footer.php';
