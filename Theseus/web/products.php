<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 10:28
 */

require '../../vendor/autoload.php';
require_once "config/config.php";


$controlEvenement = new \control\ControlEvenement($bdd);
$evenements = $controlEvenement->getEvenements();

include 'template/header.php';
?>

<section>
    <div id="product-content">
    <h1>Nos Produits</h1>
        <table
            id="tableproduct">
           <tr>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
           </tr>
           <tr>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
           </tr>
           <tr>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
               <th>
                   <article>
                       <img src="img/products/iphone6plus.jpg"/>
                       <h3> Iphone 6 plus</h3>
                       <h5> Description :</h5>
                       <p>
                           Ecran 5.5'' Retina HD - Résolution : 1920x1080 - 7.1mm - Puce A8 avec coprocesseur de
                           mouvement M8 - Architecture 64 bits...
                       </p>
                       <table
                           id="productinfos">
                           <tr>
                               <th>
                                   <h2> 899.90€ </h2>
                               </th>
                               <th>
                                   <button type="button" class="btn btn-success">Voir les events</button>
                               </th>
                           </tr>
                       </table>
                   </article>
               </th>
           </tr>
        </table>
    </div>
</section>



<?php include 'template/footer.php'; ?>