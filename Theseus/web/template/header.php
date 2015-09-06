<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 21/03/2015
 * Time: 13:05
 */
require '../../vendor/autoload.php';
session_start();
$controlClient = new \control\ControlClient(\config\Db::getInstance());
$logged = false;
if($controlClient->isLogged()) {
  $client = $_SESSION['login'];
  $logged = true;
}

?>

<?php if($logged) { ?> <?php } else { ?>  <?php } ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Theseus</title>
  <link rel="stylesheet" href="css/slippry.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style2.css">
</head>

<body>
  <header>
    <section id="logo">
      <a href="index.php">
        <img src="img/logo.png">
      </a>
    </section>
    <section id="header_slogan">
      <a href="index.php">
        <h1>THESEUS</h1>
        <h2>Le meilleur du High-Tech</h2>
      </a>
    </section>
    <section id="header_block">
      <div class="navbar-collapse">
        <div class="navbar-right">
          <fieldset>
            <div class="btn-group" id="dropdownMenu">
            <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
              <span class="glyphicon glyphicon-user" aria-haspopup="true" aria-expanded="false"></span><br><br>
              <p id="nameLogin"><?php if($logged) { echo $client->getNom(); } else { ?> Me connecter <?php } ?></p>
            </a>
            <div id="logged" class="dropdown-menu dropConnexion" <?php if(!$logged) { ?>style="display: none;" <?php } ?>>
                <div class="col-sm-12">
                  <h2 id="welcomeLogged"> Bienvenue <?php if($logged) { echo $client->getNom(); } ?> </h2>
                  <div class="col-sm-12">
                    <span class="glyphicon glyphicon-user" aria-haspopup="true" aria-expanded="false"></span>
                    <a id="menuAccount" class="inscriptionLink" href="myaccount.php">Mon Compte</a><br><br>
                  </div>
                  <div class="col-sm-12" style="padding-top: 0px; left: 8px;">
                    <span class="glyphicon glyphicon-remove-sign" aria-haspopup="true" aria-expanded="false"></span>
                    <a id="logout" class="inscriptionLink" href>Se déconnecter</a>
                  </div>
                </div>
            </div>
            <div id="notLogged" class="dropdown-menu dropConnexion" <?php if($logged) { ?>style="display: none;" <?php } ?> >
              <?php include 'loginForm.php'; ?>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
    </section>
    <nav class="navbar navbar-custom navbar-static-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle navbar-collapse" data-toggle="collapse" data-target="#menu-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="text-decoration: none;" class="navbar-title" href="#"></a>
      </div>

      <div class="collapse navbar-collapse" id="menu-collapse">
        <ul class="nav navbar-nav">
          <li id="menuHome" ><a href="index.php">Home</a></li>
          <li id="menuProductPhare" ><a href="featuredProducts.php">Les Produits phares</a></li>
          <li id="menuProduct" ><a href="products.php">Nos Produits</a></li>
          <li id="menuEvent" ><a href="events.php">Nos Events</a></li>
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
  <section id="wrapper">