<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

include 'template/header.php';
?>
  <section id="news-demo">
    <article>
      <div class="text-content">
        <h2>Vente exceptionnelle de produits AUDIO</h2>
        <p>Retrouvez notre sélection de produits AUDIO lors de notre prochaine vente du <a href="events.php">7 novembre 2015 à l'Espace Monsieur Bleu</a></p>
        <a href="#" class="button-link read-more">En savoir +</a>
      </div>
      <div class="image-content"><img src="img/others/vente-son.jpg" alt="slide1"></div>
    </article>
    <article>
      <div class="text-content">
        <h2>LCD ? 4K ? Nous avons forcément le produit qu'il vous faut...</h2>
        <p>Découvrez notre sélection de produits 4k cruve lors de notre prochaine vente du <a href="events.php">22 novembre 2015</a></p>
        <a href="#" class="button-link read-more">En savoir +</a>
      </div>
      <div class="image-content"><img src="img/slider/samsung-u2.jpg" alt="slide2"></div>
    </article>
    <article>
      <div class="text-content">
        <h2>Vente privée dédiée aux derniers smartphones</h2>
        <p>HTC ? Samsung ? Apple ? Nous avons toutes les marques de smartphones. Venez les découvrir !</p>
        <a href="#" class="button-link read-more">En savoir +</a>
      </div>
      <div class="image-content"><img src="img/slider/smartphones.jpg" alt="slide3"></div>
    </article>
  </section>
  
  <section id="event">
    <div class="grid">
      <figure class="effect-goliath">
        <h2>Produits phares</h2>
        <img src="img/products/panasonic-lumix-fz1000.jpg" alt="lumix"/>
        <figcaption>
          <p><a href="#">Sélection de nos meilleurs produits !</a></p>
        </figcaption>
      </figure>
      <figure class="effect-goliath">
        <h2>Events</h2>
        <img src="img/others/ventes2.jpg" alt="lacieDD"/>
        <figcaption>
          <p><a href="events.php">Découvrez nos prochains évents !</a></p>
        </figcaption>
      </figure>
      <figure class="effect-goliath">
        <h2>News et alertes</h2>
        <img src="img/others/abonnes-newsletter2.jpg" alt="newsletter"/>
        <figcaption>
          <p><a href="#">S'inscrire</a></p>
        </figcaption>
      </figure>
    </div>
  </section>

<?php include 'template/footer.php'; ?>