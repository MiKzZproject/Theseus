<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/08/2015
 * Time: 11:33
 */

include('template/header.php');

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset ($_POST['tel']) && isset($_POST['pwd']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $newsletter = false;
    $alerte = false;
    if(isset($_POST['newsletter'])){
        $newsletter = true;
    }
    if(isset($_POST['alerte'])){
        $alerte = true;
    }
    $client = new \model\Client(array(
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "dateNaissance" => $_POST['dateNaissance'],
        "tel" => $_POST['tel'],
        "email" => $_POST['email'],
        "pwd" => $_POST['pwd'],
        "newsletter" => $newsletter,
        "alerte" => $alerte
    ));

    $factoryClient = new factory\FactoryClient($bdd);
    $user = $factoryClient->addClient($client);
}

?>
    <!-- Page Content -->
    <div id="content">
        <div class="container">
            <!-- Selection 3 blocks -->
            <div class="col-lg-12">
                <h2 class="header-title green nohover">Formulaire d'Inscription Theseus</h2>
            </div>
            <div class="row timer center">
                <div class="col-md-12 col-sm-6">
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="form-group">
                            <label for="dateNaissance">Date de naissance</label>
                            <input type="date" name="dateNaissance" class="form-control" placeholder="1989-05-27">
                        </div>
                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="tel" name="tel" class="form-control" placeholder="0654789872">
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse Mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mot de Passe</label>
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Mot de Passe">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="newsletter"> Recevoir nos Newsletter
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="alerte"> Etre averti de nos derniers évènements
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">S'enregistrer</button>
                    </form>
                </div>
            </div>

<br/>
<br/>
<?php
include('template/footer.php');

