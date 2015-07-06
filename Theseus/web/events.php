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

            $startDate = $startDate->format("D d M Y - H:i");  //"Y/m/D H:i"

            $startDate = $startDate->format("Y/m/d H:i");

            $endDate = date_create($evenement->getDateFin());
            $endDate = $endDate->format("Y/m/d H:i");

            $currentDate = new dateTime("now");
            $currentDate = $currentDate->format("Y/m/d H:i");

            if($endDate < $currentDate){
                $state = "outdated";
                $txt = "Evènement FERME";
            }else{
                $state = "";
                $txt = "Evènement OUVERT";
            }



            $endDate = date_create($evenement->getDateFin());
            $endDate = $endDate->format("Y/m/d H:i");


            $currentDate = new dateTime("now");
            $currentDate = $currentDate->format("Y/m/d H:i");

            if($endDate < $currentDate){
                $state = "outdated";
            }else{
                $state = "";
            }


        ?>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <a href="" class="bloc-event <?php echo $state; ?>" data-toggle="modal" data-target="#myModal<?php echo $evenement->getId(); ?>">
                <h3><?php echo $evenement->getLibelle(); ?></h3>
                <div class="img" style="background-image:url(<?php echo $evenement->getMiniature1(); ?>)"></div>
                <div class="infos">
                    <p>
                        <span class="date"><?php echo $startDate; ?></span>
                        <span class="place"><?php echo $evenement->getLieu(); ?></span>
                    </p>
                    <?php if($state == "outdated"){ ?>
                        <div class="event-done">évènement<br/> terminé</div>
                    <?php }else{ ?>
                        <button><i class="icon glyphicon glyphicon-eye-open"></i> En savoir<br/> plus</button>
                    <?php }; ?>
                </div>
            </a>
        </div>

        <div class="jumbotron <?php echo $state; ?>">
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
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Lieu : <?php echo $evenement->getLieu(); ?><br/>
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date : <?php echo $startDate; ?> - <?php echo $endDate; ?><br />
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Adresse :   <?php echo $evenement->getAdresse(); ?> - <?php echo $evenement->getCp(); ?> <?php echo $evenement->getVille(); ?><br />
                                <span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Produits : <?php echo $evenement->getTheme(); ?><br/>
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Description : <?php echo $evenement->getDescription(); ?>
                            </p>

                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Lieu : <?php echo $evenement->getLibelle(); ?><br/>
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date : <?php echo $startDate; ?> - <?php echo $endDate; ?><br />
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


        <?php } ?>
        <div class="clear"></div>
    </div>
</section>



<?php include 'template/footer.php'; ?>