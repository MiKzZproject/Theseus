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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">


</head>
<body>
  <header>


  </header>

  <!-- essai slider Flo    http://slippry.com/examples/news/    -->

  <!--
  <section id="news-demo">
    <article>
      <div class="text-content">
        <h2>Image 1 du slider - Bugatti</h2>
        <p>Description de l'image 1 du slider.</p>
        <a href="#" class="button-link read-more">read more</a>
      </div>
      <div class="image-content"><img src="img/slider/slide1.jpg" alt="slide1"></div>
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

   -->

  <!-- essai slider Flo -->


  <section>
      <h2>Events</h2>
      <div class="grid">
        <figure class="effect-goliath">
          <img src="img/products/testPaysage2.jpg" alt=paysage2"/>
          <figcaption>
            <h2>Prochain évènement</h2>
            <p><a href="#">En savoir +</a></p>
          </figcaption>
        </figure>
        <figure class="effect-goliath">
          <img src="img/products/bulles.png" alt="bulles"/>
          <figcaption>
            <h2>Produits phares</h2>
            <p><a href="#">En savoir +</a></p>
          </figcaption>
        </figure>
        <figure class="effect-goliath">
          <img src="img/products/testPaysage.jpg" alt="paysage"/>
          <figcaption>
            <h2>News et alertes</h2>
            <p><a href="#">En savoir +</a></p>
          </figcaption>
        </figure>
      </div>
  </section>
  <footer>

  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/script.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="js/scriptSlider.js"></script>
</body>
</html>