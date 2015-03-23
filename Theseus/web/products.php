<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

include 'template/header.php';

$controlProduits = new \control\ControlProduit($bdd);
$produits = $controlProduits->getProduits();

?>

<section>
    <div id="product-content">
    <h1>Nos Produits</h1>
        <table
            id="tableproduct">
            <tr>
            <?php
            $count = 0;
            foreach ($produits as $produit){
                $count++;
                ?>

               <th>
                   <article>
                       <a href="#">
                           <img src="<?php echo $produit->getImage() ?>"/>
                           <h3> <?php echo $produit->getLibelle() ?></h3>
                       </a>
                           <h5> Description :</h5>
                       <a href="#">
                           <?php echo substr($produit->getDescription(),0,200)."..." ?>
                       </a>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> <?php echo $produit->getPrix() ?> </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
               <?php
               if($count%3 === 0) {
                    echo "</tr><tr>";
               }
               ?>
           <?php } ?>
           </tr>
        </table>
    </div>
</section>



<?php include 'template/footer.php'; ?>