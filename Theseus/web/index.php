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

  <title>Theseus</title>
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
        <fieldset>
            <legend>Panier</legend>
            <div>
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><br>
                <p>2 Articles</p>
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
          <li class="active"><a href="index.php">Home</a></li>
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

  <section id="news-demo">
    <article>
      <div class="text-content">
        <h2>Vente de produits audio</h2>
        <p>Retrouvez notre sélection de produits audio lors de notre prochaine vente du <a href="events.php">7 novembre 2015 à l'Espace Monsieur Bleu</a></p>
        <a href="#" class="button-link read-more">read more</a>
      </div>
      <div class="image-content"><img src="img/others/vente-son.jpg" alt="slide1"></div>
    </article>
    <article>
      <div class="text-content">
        <h2>Image 2 du slider - Paris</h2>
        <p>Description de l'image 2 du slider.</p>
        <a href="#" class="button-link read-more">read more</a>
      </div>
      <div class="image-content"><img src="img/slider/slide2.jpg" alt="slide2"></div>
    </article>
    <article>
      <div class="text-content">
        <h2>Image 3 du slider - Ciel/Nuage</h2>
        <p>Description de l'image 3 du slider.</p>
        <a href="#" class="button-link read-more">read more</a>
      </div>
      <div class="image-content"><img src="img/slider/slide3.jpg" alt="slide3"></div>
    </article>
  </section>
  
  <section id="event">
    <div class="grid">
      <figure class="effect-goliath">
        <h2>Produits phares</h2>
        <img src="img/products/panasonic-lumix-fz1000.jpg" alt="paysage2"/>
        <figcaption>
          <p><a href="#">En savoir +</a></p>
        </figcaption>
      </figure>
      <figure class="effect-goliath">
        <h2>Events</h2>
        <img src="img/products/lacieDD.jpg" alt="bulles"/>
        <figcaption>
          <p><a href="#">En savoir +</a></p>
        </figcaption>
      </figure>
      <figure class="effect-goliath">
        <h2>News et alertes</h2>
        <img src="img/products/DDcorsair-voyager-air-2.jpg" alt="paysage"/>
        <figcaption>
          <p><a href="#">En savoir +</a></p>
        </figcaption>
      </figure>
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
            <a href="mailto:admin@theseus.com">Contact</a>
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