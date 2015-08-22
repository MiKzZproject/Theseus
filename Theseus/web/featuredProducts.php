<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/08/2015
 * Time: 15:06
 */

include 'template/header.php';

$factoryProduits = new control\FactoryProduit($bdd);
$produits = $factoryProduits->getFeaturedProducts();
$produitsCount = $factoryProduits->getProduitsCount();

?>
    <section id="product-content">
        <h1>Nos Produits Phares</h1>
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
<?php
include 'template/footer.php';
