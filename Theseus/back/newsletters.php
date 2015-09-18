<?php
require('config/config.php');
?>
<h3>Newsletters</h3><br><br>

<?php
if($_SESSION['admin']->getNiveau() == 4 || $_SESSION['admin']->getNiveau() == 1){
    ?>

<div class="block_newsletter">

    <button class="btn btn-success" data-toggle="modal" data-target="#sendMailing" onclick="mailing()">Envoyer la newsletter</button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

    <a target="_blank" href="newsletter/exportCSV.php"><button class="btn btn-success" data-toggle="modal">Exporter les emails (CSV)</button></a>
</div>
<?php
}else{
    ?>
    <p class="bg-warning"><br>Vous n'avez pas l'autorisation d'accéder à cette page.<br><br></p>
<?php
}
?>
