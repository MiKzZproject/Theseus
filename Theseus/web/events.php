<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

include 'template/header.php';

$controlEvenement = new \control\ControlEvenement($bdd);
$evenements = $controlEvenement->getEvenements();
?>

<section>
    <div id="events-content">
    <h1>Nos Events</h1>
        <?php

        foreach ($evenements as $evenement){

        $startDate = date_create($evenement->getDateDebut());
        $endDate = date_create($evenement->getDateFin());

        ?>

        <div class="jumbotron">
            <h3><?php echo $evenement->getLibelle(); ?></h3>
            <h5><?php echo date_format($startDate, "Y/m/d H:i"); ?></h5>
            <h5>Thème de la vente : <?php echo $evenement->getTheme(); ?> </h5><img src="<?php echo $evenement->getMiniature1(); ?>"><img src="<?php echo $evenement->getMiniature2(); ?>">
            <div class="alert alert-success" role="alert">
                <a href="#" class="alert-link">Evènement OUVERT</a>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $evenement->getId(); ?>">
                En savoir +
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo $evenement->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Lieu : <?php echo $evenement->getLibelle(); ?><br/>
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date : <?php echo date_format($startDate, "Y/m/d H:i"); ?> - <?php echo date_format($endDate, "Y/m/d H:i"); ?><br />
                            <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Adresse :   <?php echo $evenement->getAdresse(); ?> - <?php echo $evenement->getCp(); ?> <?php echo $evenement->getVille(); ?><br />
                            <span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Produits : <?php echo $evenement->getTheme(); ?><br/>
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Description : <?php echo $evenement->getDescription(); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary">S'inscrire à l'évènement</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>



<?php include 'template/footer.php'; ?>