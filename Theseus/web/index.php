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
        <a href="events.php" class="button-link read-more">En savoir +</a>
      </div>
      <div class="image-content"><img src="img/others/vente-son.jpg" alt="slide1"></div>
    </article>
    <article>
      <div class="text-content">
        <h2>LCD ? 4K ? Nous avons forcément le produit qu'il vous faut...</h2>
        <p>Découvrez notre sélection de produits 4k cruve lors de notre prochaine vente du <a href="events.php">22 novembre 2015</a></p>
        <a href="events.php" class="button-link read-more">En savoir +</a>
      </div>
      <div class="image-content"><img src="img/slider/samsung-u2.jpg" alt="slide2"></div>
    </article>
    <article>
      <div class="text-content">
        <h2>Vente privée dédiée aux derniers smartphones</h2>
        <p>HTC ? Samsung ? Apple ? Nous avons toutes les marques de smartphones. Venez les découvrir !</p>
        <a href="events.php" class="button-link read-more">En savoir +</a>
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
          <p><a href="products.php">Sélection de nos meilleurs produits !</a></p>
        </figcaption>
      </figure>
      <figure class="effect-goliath">
        <h2>Events</h2>
        <img src="img/others/ventes2.jpg" alt="lacieDD"/>
        <figcaption>
          <p><a href="events.php">Découvrez nos prochains évents !</a></p>
        </figcaption>
      </figure>
      <figure class="effect-goliath" data-toggle="modal" data-target=".newsletter">
        <h2>News et alertes</h2>
        <img src="img/others/abonnes-newsletter2.jpg" alt="newsletter"/>
        <figcaption>
          <p><a href="#">S'inscrire</a></p>
        </figcaption>
      </figure>
      <!-- Modal -->
      <div class="modal fade newsletter" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Inscription newsletter Theseus</h4>
            </div>
            <div class="modal-body" >
              <div id="newsletterError" class="alert alert-danger hideBlock" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Erreur:</span>
                Veuillez saisir une adresse email valide
              </div>
              <div id="newsletterInfo" class="alert alert-info hideBlock" role="alert">Vous êtes déjà inscrit à la newsletter</div>
              <div id="newsletterSuccess" class="alert alert-success hideBlock" role="alert">Vous êtes inscrit à la newsletter</div>
              <form method="post" id="newsletterForm">
                <div class="form-group" >
                  <label for="mailNewsletter">Saisir votre adresse mail</label>
                  <input type="email" class="form-control" name="mail" id="mailNewsletter" placeholder="Email">
                </div>
                <button type="button" class="btn btn-default floatR" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary floatL">S'inscrire</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include 'template/footer.php'; ?>