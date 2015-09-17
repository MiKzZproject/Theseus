<?php
require('../config/config.php');
$controlCategorie = new \control\ControlCategorie($bdd);

$categories = $controlCategorie->getCategories();

if($categories){
?>

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
                <td ><span style="color:orange" class="glyphicon glyphicon-edit click" aria-hidden="true" data-toggle="modal" data-target="#modalUpdateCategorie" onclick="categorieUpdate('<?php echo $categorie->getId() ?>')"></span></td>
                <td><span style="color:red" class="glyphicon glyphicon-remove click" aria-hidden="true" onclick="categorieDelete('<?php echo $categorie->getId() ?>')"></span></td>
            </tr>
        <?php
        }
        ?></table>
<?php
}else{
    ?>
        <div class="alert alert-warning" role="alert">Pas de résultat pour cette recherche.</div>
<?php
}