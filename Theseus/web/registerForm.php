<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/08/2015
 * Time: 11:33
 */

include('template/header.php');
?>
    <!-- Page Content -->
    <div id="content" class="registerForm">
        <div class="container">
            <!-- Selection 3 blocks -->
            <div class="col-lg-12">
                <h2 class="header-title green nohover">Formulaire d'Inscription</h2>
            </div>
            <div id="registerSuccess" class="alert alert-success hideBlock" role="alert">Vous êtes dès à present inscrit. Vous pouvez vous connecter.</div>
                <form method="post" id="formRegister">
                    <div id="registerErrorNom" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Veuillez saisir un nom valide
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                    </div>
                    <div id="registerErrorPrenom" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Veuillez saisir un prénom valide
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                    </div>
                    <div id="registerErrorDate" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Veuillez saisir une date de naissance valide
                    </div>
                    <div class="form-group">
                        <label for="dateNaissance">Date de naissance</label>
                        <input type="" data-uk-datepicker="{format:'DD-MM-YYYY'}" name="date" class="form-control" placeholder="27-05-1989">
                    </div>
                    <div id="registerErrorTel" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Veuillez saisir un numéro de téléphone valide
                    </div>
                    <div class="form-group">
                        <label for="tel">Téléphone</label>
                        <input type="tel" name="tel" class="form-control" placeholder="0654789872">
                    </div>
                    <div id="registerErrorEmail" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Veuillez saisir une adresse email valide
                    </div>
                    <div id="registerErrorEmail2" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        L'adresse email que vous avez saisie est déjà prise.
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div id="registerErrorPwd" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Veuillez saisir un mot de passe valide
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Mot de Passe">
                    </div>
                    <div id="registerErrorPwd2" class="alert alert-danger hideBlock" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Les 2 mots de passe sont différent
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirmation du mot de passe</label>
                        <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Mot de Passe">
                    </div>
                    <p>Recevoir nos newsletters : </p>
                    <div class="onoffswitch">
                        <input type="checkbox" name="newsletter" class="onoffswitch-checkbox" id="switchNewsletter">
                        <label class="onoffswitch-label" for="switchNewsletter"></label>
                    </div> <br>
                    <p>Recevoir des notifications par mail :</p>
                    <div class="onoffswitch">
                        <input type="checkbox" name="alerte" class="onoffswitch-checkbox" id="switchAlerte">
                        <label class="onoffswitch-label" for="switchAlerte"></label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">S'enregistrer</button>
                </form>
        </div>
    </div>

<br/>
<br/>
<?php
include('template/footer.php');

