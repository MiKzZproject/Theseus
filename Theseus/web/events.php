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
                <li class="active"><a href="#">Home</a></li>
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
    <h1>Nos Events</h1>
    <div id="event-1">

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