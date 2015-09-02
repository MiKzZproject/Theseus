<div class="jumbotron  <?php echo $state; ?>">
    <h3><?php echo $evenement->getLibelle(); ?></h3>
    <h5><?php echo $startDate; ?></h5>
    <h5>Thème de la vente : <?php echo $evenement->getTheme(); ?> </h5><img src="<?php echo $evenement->getMiniature1(); ?>"><img src="<?php echo $evenement->getMiniature2(); ?>">
    <div class="alert alert-success" role="alert">
        <a href="#" class="alert-link"><?php echo $txt; ?></a>
    </div>

    <!-- Button trigger modal -->

    <?php if($state != "outdated"){ ?>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $evenement->getId(); ?>">
            En savoir +
        </button>
    <?php }; ?>


    <!-- Modal -->
    <div class="modal fade modal-event" id="myModal<?php echo $evenement->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $evenement->getLibelle(); ?> - <?php echo date_format($startDate, "Y/m/d H:i"); ?></h4>
                </div>
                <div class="modal-body">
                    <div id="miniature-salle">
                        <img src="<?php echo $evenement->getImage(); ?>"/>
                    </div>
                    <p>
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Lieu : <?php echo $evenement->getLibelle(); ?><br/>
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date : <?php echo $startDate; ?> - <?php echo $endDate; ?><br />
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Adresse :   <?php echo $evenement->getAdresse(); ?> - <?php echo $evenement->getCp(); ?> <?php echo $evenement->getVille(); ?><br />
                        <span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Produits : <?php echo $evenement->getTheme(); ?><br/>
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Description : <?php echo $evenement->getDescription(); ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">S'inscrire à l'évènement</button>
                </div>
            </div>
        </div>
    </div>
</div>