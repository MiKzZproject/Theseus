<?php
require('config/config.php');
$controlCategorie = new \control\ControlCategorie($bdd);
$categories = $controlCategorie->getCategories();

if($_SESSION['admin']->getNiveau() == 3 || $_SESSION['admin']->getNiveau() == 1){
    ?>
    <h3>Gestion des Catégories</h3><br><br>
    <button class="btn btn-success" data-toggle="modal" data-target="#addProduitModal">Ajouter une catégorie</button><br><br>
    <table class="table table-striped">
        <tr>
            <td>Nom</td>
            <td>description</td>
            <td>image</td>
            <td></td>
            <td></td>
        </tr>
    <?php
    foreach($categories as $categorie){
        ?>
            <tr>
                <td><?php echo $categorie->getNom(); ?></td>
                <td><?php echo $categorie->getDescription(); ?></td>
                <td>
                    <?php if(!is_null($categorie->getImage())){
                                ?><img src="../web/<?php echo $categorie->getImage(); ?>" style="width:10%"></td>
                        <?php
                            }else{
                                echo "Pas d'images disponible";
                            } ?>
                <td></td>
                <td></td>
            </tr>
        <?php
    }

}else{
    ?>
    <p class="bg-warning"><br>Vous n'avez pas l'autorisation d'accéder à cette page.<br><br></p>
<?php
}
?>