<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 21/03/2015
 * Time: 13:05
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
<!--        <fieldset>-->
<!--            <legend>Panier</legend>-->
<!--            <div>-->
<!--                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><br>-->
<!--                <p>2 Articles</p>-->
<!--            </div>-->
<!--        </fieldset>-->
    </section>
    <nav class="navbar navbar-custom navbar-static-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle navbar-collapse" data-toggle="collapse" data-target="#menu-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="menu-collapse">
        <ul class="nav navbar-nav">
          <li id="menuHome" ><a href="index.php">Home</a></li>
          <li id="menuProductPhare" ><a href="products.php">Les Produits phares</a></li>
          <li id="menuProduct" ><a href="products.php">Nos Produits</a></li>
          <li id="menuEvent" ><a href="events.php">Nos Events</a></li>
          <li id="menuAccount" ><a href="#">Mon Compte</a></li>
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
