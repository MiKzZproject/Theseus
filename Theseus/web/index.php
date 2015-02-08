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
  <section>
      <h2>Events</h2>
      <div class="grid">
        <figure class="effect-goliath">
          <img src="img/products/Calendar.jpg" alt=prochain-evenement"/>
          <figcaption>
            <h2>Prochain évènement</h2>
            <p><a href="#">View more</a></p>
          </figcaption>
        </figure>
        <figure class="effect-goliath">
          <img src="img/products/Nexus7WirelessKeyboardCase.jpg" alt="Nexus7WirelessKeyboardCase"/>
          <figcaption>
            <h2>Produits phares</h2>
            <p><a href="#">View more</a></p>
          </figcaption>
        </figure>
        <figure class="effect-goliath">
          <img src="img/products/Newsletter.jpg" alt="Newsletter"/>
          <figcaption>
            <h2>News et alertes</h2>
            <p><a href="#">View more</a></p>
          </figcaption>
        </figure>
      </div>
  </section>
  <footer>

  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/script.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>