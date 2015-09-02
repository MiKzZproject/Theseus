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
$Page = $_GET['p'];
if (empty($Page))
    $Page = 1;
$PerPage = 9;

$produits = $controlProduits->getProduitsPagination($Page-1, $PerPage);
$produitsCount = $controlProduits->getProduitsCount();
$nbPage = ceil($produitsCount/$PerPage);
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

<div class="paginationProduct">
    <?php
    //affichage pagination

    for($i=1; $i<=$nbPage; $i++)
    {
        if($i==$Page){
            echo " $i / ";
        } else {
            echo " <a href='products.php?p=$i'>$i</a> /";
        }
    }

    // fin pagination
    ?>
</div>

<?php
if(empty($produits)) {
    ?>
    <div class="alert alert-info" role="alert"><p>Aucun produits ne correspond à votre recherche</p></div>
<?php } else { ?>
    <div id="tableproduct" >
        <?php foreach ($produits as $produit) {
            include 'template/product.php';
       } ?>
    </div>
<?php } ?>
</section>
<div class="paginationProduct">
    <?php
    //affichage pagination

    for($i=1; $i<=$nbPage; $i++)
        {
            if($i==$Page){
                echo " $i / ";
            } else {
                echo " <a href='products.php?p=$i'>$i</a> /";
            }
        }

    // fin pagination
?>
</div>
<?php
include 'template/footer.php';
