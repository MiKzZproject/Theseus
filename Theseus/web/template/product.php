

<article id="product<?php /** @var $produit \model\Produit */ echo $produit->getId() ?>" <?php if($produitsCount < 2) { echo "style='width: 48%'"; }?>>
    <div class="contentproduct" >
        <div class="infoProduct">
        <a href="#" data-toggle="modal" data-target="#modalProduit<?php echo $produit->getId(); ?>" >
            <img src="<?php echo $produit->getImage(); ?>"/>
            <h3> <?php echo $produit->getLibelle(); ?></h3>
        </a>
        <h5> Description :</h5>
        <a href="#" data-toggle="modal" data-target="#modalProduit<?php echo $produit->getId(); ?>">
            <?php echo substr($produit->getDescription(),0,180)."..."; ?>
        </a>
        </div>
    </div>
    <div>
        <table
            id="productinfos">
            <tr>
                <th>
                    <h2> <?php echo $produit->getPrix(); ?> €</h2>
                </th>
                <th>
                    <a href="events.php?idproduit=<?php echo $produit->getId(); ?>"><button type="button" class="btn btn-success">Voir les évènements</button></a>
                </th>
            </tr>
        </table>
    </div>
</article>
<!-- Modal -->
<div class="modal fade modal-product" id="modalProduit<?php echo $produit->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $produit->getLibelle(); ?></h4>
            </div>
            <div class="modal-body">
                <div id="miniature-salle">
                    <a href="#my-id<?php echo $produit->getId(); ?>" data-uk-modal>
                        <img src="<?php echo $produit->getImage(); ?>"/>
                    </a>
                </div>

                <p>
                <span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Prix : <?php echo $produit->getPrix() ?> €<br/>
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Marque : <?php echo $produit->getMarque() ?> <br/>
                <span class="glyphicon glyphicon-random" aria-hidden="true"></span> Modele : <?php echo $produit->getModele() ?> <br/>
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Description : <?php echo $produit->getDescription() ?> <br/>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <a href="events.php?idproduit=<?php echo $produit->getId(); ?>"><button type="button" class="btn btn-primary">Voir les évènements</button></a>
            </div>
        </div>
    </div>

    <div id="my-id<?php echo $produit->getId(); ?>" class="uk-modal">
        <div class="uk-modal-dialog uk-modal-dialog-lightbox">
            <a href="<?php echo $produit->getImage(); ?>" class="uk-modal-close uk-close uk-close-alt"></a>
            <img src="<?php echo $produit->getImage(); ?>" alt="<?php echo $produit->getLibelle(); ?>">
        </div>
    </div>
</div>