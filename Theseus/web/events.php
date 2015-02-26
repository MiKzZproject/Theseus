<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

require '../../vendor/autoload.php';
require_once "config/config.php";

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Theseus - Events</title>
    <link rel="stylesheet" href="css/slippry.css">  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">


</head>
<body>
<header>
    <section id="logo"><img src="img/logo.png"></section>
    <section id="header_slogan">
        <h1>THESEUS</h1>
        <h2>Le meilleur du High-Tech</h2>
    </section>
    <section id="header_block">
        <fieldset>
            <legend>Connexion</legend>
            <div>
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>
                <p>Espace Client</p>
            </div>

        </fieldset>
    </section>
    <nav class="navbar navbar-custom navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-collapse" data-toggle="collapse" data-target="#menu-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="menu-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Home</a></li>
                <li><a href="#">Nos Produits</a></li>
                <li><a href="events.php">Nos Events</a></li>
                <li><a href="#">Mon Compte</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </button>
            </span>
                </div>
            </form>
        </div>
    </nav>
</header>
<section>
    <div id="events-content">
    <h1>Nos Events</h1>
    <div class="jumbotron">
        <h3>Le Yoyo Palais de Tokyo</h3>
        <h5>Samedi 10 octobre 2015 - 19h30</h5>
        <h5>Type de produits : Smartphones et Tablettes</h5><img src="img/others/tablette.jpg"><img src="img/others/smartphone.jpg">
        <div class="alert alert-success" role="alert">
            <a href="#" class="alert-link">Evènement OUVERT</a>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            En savoir +
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Le Yoyo Palais de Tokyo - 10 octobre 2015 - 19h30</h4>
                    </div>
                    <div class="modal-body">
                        <div id="miniature-salle">
                            <img src="img/salles/yoyo-palais-de-tokyo.jpg"/>
                        </div>
                        Lieu : Le Yoyo Palais de Tokyo<br/>
                        Date : 10 octobre 2015 - 19h30<br/>
                        Adresse : 13, avenue du Président Wilson 75116 Paris<br/>
                        Produits : Smartphones et Tablettes<br/>
                        Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus. Curabitur consectetur, nisl nec tempus rhoncus, nibh ipsum varius ex, et iaculis erat metus vel felis. Vestibulum turpis elit, malesuada at nunc at, posuere ultricies felis. Sed in euismod est. Ut sit amet mi pretium, vestibulum elit non, rhoncus lectus. Mauris ut ex viverra, efficitur nisl sed, fermentum velit. Proin malesuada ex nisl. Proin neque sem, volutpat at blandit id, tempus sit amet lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel justo ex. Morbi at odio et urna pharetra rutrum.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">S'inscrire à l'évènement</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron">
        <h3>Le Départ </h3>
        <h5>Samedi 24 octobre 2015 - 20h00</h5>
        <h5>Type de produits : Photos et Vidéos</h5><img src="img/others/photo.jpg"><img src="img/others/video.jpg">
        <div class="alert alert-success" role="alert">
            <a href="#" class="alert-link">Evènement OUVERT</a>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
            En savoir +
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Le Yoyo Palais de Tokyo - 10 octobre 2015 - 19h30</h4>
                    </div>
                    <div class="modal-body">
                        <div id="miniature-salle">
                            <img src="img/salles/le-depart.jpg"/>
                        </div>
                        Lieu : Le Départ<br/>
                        Date : 24 octobre 2015 - 20h00<br/>
                        Adresse : 34-36, rue du Départ 75015 Paris<br/>
                        Produits : Photos et Vidéos<br/>
                        Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus. Curabitur consectetur, nisl nec tempus rhoncus, nibh ipsum varius ex, et iaculis erat metus vel felis. Vestibulum turpis elit, malesuada at nunc at, posuere ultricies felis. Sed in euismod est. Ut sit amet mi pretium, vestibulum elit non, rhoncus lectus. Mauris ut ex viverra, efficitur nisl sed, fermentum velit. Proin malesuada ex nisl. Proin neque sem, volutpat at blandit id, tempus sit amet lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel justo ex. Morbi at odio et urna pharetra rutrum.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">S'inscrire à l'évènement</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron">
        <h3>Pavillon Daunou</h3>
        <h5>Samedi 7 février 2015 - 19h00</h5>
        <h5>Type de produits : Casques audios</h5><img src="img/others/casque.jpg">
        <div class="alert alert-danger" role="alert">
            <a href="#" class="alert-link">Evènement Terminé</a>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal3">
            En savoir +
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Pavillon Daunou - 7 février 2015 - 19h00</h4>
                    </div>
                    <div class="modal-body">
                        <div id="miniature-salle">
                            <img src="img/salles/pavillon-daunou.jpg"/>
                        </div>
                        Lieu : Pavillon Daunou<br/>
                        Date : 7 février 2015 - 19h00<br/>
                        Adresse : 18, rue Daunou 75002 Paris<br/>
                        Produits : Casques audios<br/>
                        Description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum congue mi sed convallis. Mauris lacinia ultricies porttitor. In sit amet nisi diam. Nam eros sem, cursus ac viverra eu, vehicula ac mi. Donec vitae erat malesuada, viverra arcu at, consequat metus. Curabitur consectetur, nisl nec tempus rhoncus, nibh ipsum varius ex, et iaculis erat metus vel felis. Vestibulum turpis elit, malesuada at nunc at, posuere ultricies felis. Sed in euismod est. Ut sit amet mi pretium, vestibulum elit non, rhoncus lectus. Mauris ut ex viverra, efficitur nisl sed, fermentum velit. Proin malesuada ex nisl. Proin neque sem, volutpat at blandit id, tempus sit amet lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel justo ex. Morbi at odio et urna pharetra rutrum.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">S'inscrire à l'évènement</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<footer>
    <section id="footer_reseau">
        <h3>Nous suivre : </h3><br>
        <a href="//plus.google.com/u/0/104188505974959376188?prsrc=3"
           rel="publisher" target="_top" style="text-decoration:none;">
            <img src="//ssl.gstatic.com/images/icons/gplus-64.png" alt="Google+" style="border:0;width:64px;height:64px;"/>
        </a>
        <a href="http://www.facebook.com/sharer.php?u=<url to share>&t=<title of content>">&nbsp;&nbsp;<img id="facebook" src="img/reseau/facebook.png"></a>
        <a href="http://www.facebook.com/sharer.php?u=<url to share>&t=<title of content>">&nbsp;&nbsp;<img id="twitter" src="img/reseau/twitter.png"></a>
    </section><!--
      --><section id="footer_text">Copyright ©Theseus 2014 <br>Tous drois sont réservés</section><!--
      --><section id="footer_terme">
        <h3>Termes et conditions : </h3>
        <div>
            <a href="">Faq</a><br>
            <a href="">CGV</a><br>
            <a href="">Contact</a>
        </div>
    </section>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/slippry.js"></script>
<script src="js/scriptSlider.js"></script>

</body>
</html>