<article id="product<?php echo $produit->getId() ?>" <?php if($produitsCount < 2) { echo "style='width: 48%'"; }?>>
    <div class="contentproduct" >
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
    </div>
</article>
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