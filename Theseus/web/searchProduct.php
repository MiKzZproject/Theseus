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
$search = isset($_POST['search']) ? $_POST['search'] : "" ;

// pagination
$perPage = \config\Theseus::NBPERPAGEPRODUCT;
$produits = $controlProduits->getSearchProduitsPagination($search,1);
$produitsCount = $controlProduits->getSearchProduitsCount($search);
$nbPage = ceil($produitsCount/$perPage);
//

$controlCategories = new control\ControlCategorie($db);
$categories = $controlCategories->getCategories();

?>
<section id="product-content">
    <div class="form-group" id="productfilter">
        <select id="selectcatprodsearch" class="form-control">
            <option class='selectcat' value="all" selected>Toutes les catégories</option>
            <?php
            /** @var $categorie \model\Categorie */
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
            /** @var $produit \model\Produit */
            include 'template/product.php';
       } ?>
        <div class="paginationProduct">
            <div class="paginationProduct">
                <!--        affichage pagination-->
                <nav>
                    <ul class="pager">
                        <input type="hidden" id="searchTxt" value="<?php echo $search; ?>" name="search">
                        <li class="previous previousSearchProduct disabled"><a href>Précédente</a></li>
                        <li id="currentPage" data-nbpage="<?php echo $nbPage; ?>" data-page="1" class="active"><a>1</a></li>
                        <li class="next nextSearchProduct <?php if($nbPage == 1) echo "disabled"; ?>"><a href>Suivante</a></li>
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
