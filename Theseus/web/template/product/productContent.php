<?php

require '../../../../vendor/autoload.php';
require '../../config/config.php';


$controlProduits = new \control\ControlProduit($bdd);
$produits = $controlProduits->getProduitsByCategorie($_POST['categorie']);
$produitsCount = $controlProduits->getProduitsByCategorieCount($_POST['categorie']);

$controlCategorie = new \control\ControlCategorie($bdd);
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
<?php
if(empty($produits)) {
    ?>
    <div class="alert alert-info" role="alert"><p>Aucun produits ne correspond à votre recherche</p></div>
<?php
} else {
    ?>
    <table id="tableproduct" <?php if($produitsCount < 2) { echo "style='width: 50%'"; }?> >
        <tr>
            <?php
            $count = 0;
            foreach ($produits as $produit){
                $count++;
                ?>

                <th>
                    <article>
                        <a href="#" data-toggle="modal" data-target="#modalProduit<?php echo $produit->getId() ?>" >
                            <img src="<?php echo $produit->getImage() ?>"/>
                            <h3> <?php echo $produit->getLibelle() ?></h3>
                        </a>
                        <h5> Description :</h5>
                        <a href="#" data-toggle="modal" data-target="#modalProduit<?php echo $produit->getId() ?>">
                            <?php echo substr($produit->getDescription(),0,200)."..." ?>
                        </a>
                        <table
                            id="productinfos">
                            <tr>
                                <th>
                                    <h2> <?php echo $produit->getPrix() ?> €</h2>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-success">Voir les events</button>
                                </th>
                            </tr>
                        </table>
                    </article>
                </th>
                <?php
                if($count%3 === 0) {
                    echo "</tr><tr>";
                }
                ?>

                <!-- Modal -->
                <div class="modal fade" id="modalProduit<?php echo $produit->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo $produit->getLibelle() ?></h4>
                            </div>
                            <div class="modal-body">
                                <div id="miniature-salle">
                                    <img src="<?php echo $produit->getImage() ?>"/>
                                </div>
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Prix : <?php echo $produit->getPrix() ?> €<br/>
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Marque : <?php echo $produit->getMarque() ?> €<br/>
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Modele : <?php echo $produit->getModele() ?> €<br/>
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Description : <?php echo $produit->getDescription() ?> €<br/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary">Voir les évènements</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tr>
    </table>
<?php
}
?>
<script src="js/script.js"></script>
