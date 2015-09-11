<?php

require '../../vendor/autoload.php';
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8','fra');

$db = \config\Db::getInstance();
$controlEvenement = new control\ControlEvenement($db);

// pagination
$perPage = \config\Theseus::NBPERPAGEEVENT;
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$evenements = $controlEvenement->getEventsPagination($page, $perPage);
$eventsCount = $controlEvenement->getEventsCount();
$nbPage = ceil($eventsCount/$perPage);
?>
<div id="events-content">
    <h1>Nos Events</h1>
        <?php
        foreach ($evenements as $evenement){
            $eventProducts = $controlEvenement->getProduitsByEvent($evenement->getId());
            $startDate = date_create($evenement->getDateDebut());
            $startDate = $startDate->getTimestamp();
            $endDate = date_create($evenement->getDateFin());
            $endDate = $endDate->getTimestamp();
            $currentDate = new dateTime("now");
            $currentDate = $currentDate->getTimestamp();
            if($endDate < $currentDate){
                $state = "outdated";
            }else{
                $state = "";
            }

            $startDate = utf8_encode(strftime("%A %d %B - %H:%M", $startDate));
            $endDate = utf8_encode(strftime("%A %d %B - %H:%M", $endDate));
            $currentDate = utf8_encode(strftime("%A %d %B - %H:%M", $currentDate));

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

            <div class="modal fade modal-event" id="myModal<?php echo $evenement->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo $evenement->getLibelle(); ?> - <?php echo $startDate; ?></h4>
                        </div>
                        <div class="modal-body">

                            <div id="miniature-salle">
                                <a href="#my-id<?php echo $evenement->getId(); ?>" data-uk-modal>
                                    <img src="<?php echo $evenement->getImage(); ?>"/>
                                </a>
                            </div>

                            <p>
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Lieu : <?php echo $evenement->getLieu(); ?><br/>
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date : <?php echo $startDate; ?> - <?php echo $endDate; ?><br />
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Adresse :   <?php echo $evenement->getAdresse(); ?> - <?php echo $evenement->getCp(); ?> <?php echo $evenement->getVille(); ?><br />
                                <span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> Produits : <?php echo $evenement->getTheme(); ?><br/>
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Description : <?php echo $evenement->getDescription(); ?>
                            </p>
                            <?php
                            foreach ($eventProducts as $produit) {  ?>
                                <img src="<?php echo $produit->getMiniature(); ?>"/>
                            <?php    }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="button" data-id="<?php echo $evenement->getId(); ?>" class="btn btn-primary subscribeEvent">S'inscrire à l'évènement</button>
                        </div>
                    </div>
                </div>

                <div id="my-id<?php echo $evenement->getId(); ?>" class="uk-modal">
                    <div class="uk-modal-dialog uk-modal-dialog-lightbox">
                        <a href="<?php echo $evenement->getImage(); ?>" class="uk-modal-close uk-close uk-close-alt"></a>
                        <img src="<?php echo $evenement->getImage(); ?>" alt="<?php echo $evenement->getLieu(); ?>">
                    </div>
                </div>
            </div>

        <?php } ?>
    <div class="clear"></div>
</div>