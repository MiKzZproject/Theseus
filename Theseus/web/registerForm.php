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
    <div id="content">
        <div class="container">
            <!-- Selection 3 blocks -->
            <div class="col-lg-12">
                <h2 class="header-title green nohover">Formulaire d'Inscription</h2>
            </div>
            <div id="newsletterSuccess" class="alert alert-success hideBlock" role="alert">Vous pouvez à present inscrit vous pouvez vous conneceter </div>
            <div class="row timer center">
                <div class="col-md-12 col-sm-6">
                    <form method="post" id="formRegiser">
                        <div id="newsletterErrorNom" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un nom valide
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                        </div>
                        <div id="newsletterErrorPrenom" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un prénom valide
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                        </div>
                        <div id="newsletterErrorDate" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir une date de naissance valide
                        </div>
                        <div class="form-group">
                            <label for="dateNaissance">Date de naissance</label>
                            <input type="date" name="dateNaissance" class="form-control" placeholder="1989-05-27">
                        </div>
                        <div id="newsletterErrorTel" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un numéro de téléphone valide
                        </div>
                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="tel" name="tel" class="form-control" placeholder="0654789872">
                        </div>
                        <div id="newsletterErrorEmail" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir une adresse email valide
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div id="newsletterErrorPwd" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un mot de passe valide
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mot de passe</label>
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Mot de Passe">
                        </div>
                        <div id="newsletterErrorPwd2" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Les 2 mots de passe sont différent
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirmation du mot de passe</label>
                            <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Mot de Passe">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="newsletter"> Recevoir nos Newsletter
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="alerte"> Recevoir des notifications par mail
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">S'enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<br/>
<br/>
<?php
include('template/footer.php');

