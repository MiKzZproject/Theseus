<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

include 'template/header.php';

$db = \config\Db::getInstance();
$controlEvenement = new control\ControlEvenement($db);

// pagination
$perPage = \config\Theseus::NBPERPAGEEVENT;

$evenements = $controlEvenement->getEventsPagination(1, $perPage);
$eventsCount = $controlEvenement->getEventsCount();
$nbPage = ceil($eventsCount/$perPage);
//

// test
$test = new control\ControlEvenement($db);
$toto = $test->getEventsCount();
//
?>

<section>
    <div id="events-content">
    <h1>Nos Events</h1>
        <?php

        date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME, 'fr_FR.utf8','fra');

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
                                <img src="<?php echo $evenement->getImage(); ?>"/>
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
                            <button type="button" class="btn btn-primary">S'inscrire à l'évènement</button>
                        </div>
                    </div>
                </div>
            </div>


        <?php } ?>
        <div class="clear"></div>
        <div class="paginationEvent">
            <div class="paginationEvent">
                <!--        affichage pagination-->
                <nav>
                    <ul class="pager">
                        <li class="previous disabled"><a href>Précédente</a></li>
                        <li id="currentPage" data-nbpage="<?php echo $nbPage; ?>" data-page="1" class="active"><a>1</a></li>
                        <li class="next "><a href>Suivante</a></li>
                    </ul>
                </nav>
                <!--        // fin pagination-->
            </div>
        </div>
    </div>
</section>



<?php include 'template/footer.php'; ?>