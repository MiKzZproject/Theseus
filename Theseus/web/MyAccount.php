<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19/08/2015
 * Time: 14:46
 */

include('template/header.php');
?>
<h1 class="ML10">Espace Mon Compte</h1>

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#commandes" aria-controls="commandes" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-shopping-cart"></span> Mes Commandes</a></li>
            <li role="presentation"><a href="#informations" aria-controls="informations" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> Mes Informations</a></li>
            <li role="presentation"><a href="#invitations" aria-controls="invitations" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-envelope"></span> Mes Invitations</a></li>
            <li role="presentation"><a href="#alertes" aria-controls="alertes" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-bell"></span> Mes alertes</a></li>
            <li role="presentation"><a href="#modifPassword" aria-controls="modifPassword" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span> Modification mot de passe</a></li>
            <li role="presentation"><a href="#abo" aria-controls="abo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-credit-card"></span> Abonnement</a></li>
        </ul>

        <!-- Tabs -->
        <div class="tab-content">
            <br />
            <div role="tabpanel" class="tab-pane active" id="commandes">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Num.</th>
                            <th>Date</th>
                            <th>Evènement</th>
                            <th>Lieu</th>
                            <th>Produit</th>
                            <th>Total €</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning">
                            <td>1</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>Iphone 6 plus</td>
                            <td>800</td>
                        </tr>
                        <tr class="info">
                            <td>2</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>Iphone 5</td>
                            <td>300</td>
                        </tr>
                        <tr class="warning">
                            <td>3</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>Samsung Galaxy Tab 4</td>
                            <td>215</td>
                        </tr>
                        <tr class="info">
                            <td>4</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>BlackBerry Q10</td>
                            <td>600</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="informations">
                <div class="container">
                    <form method="post" id="myInfos">
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
                            <input type="date" name="date" class="form-control" placeholder="1989-05-27">
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
                        <div class="form-group">
                            <label for="email">Adresse mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="invitations">
                <div class="container">
                    invitations
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="alertes">
                <div class="container">
                    <form method="post" id="myAlerts">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="newsletter"> Recevoir nos newsletters
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="alerte"> Recevoir des notifications par mail
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="modifPassword">
                <div class="container">
                    <form method="post" id="updatePassword">
                        <div id="registerErrorPwd" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir votre mot de passe actuel
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mot de passe actuel</label>
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Mot de Passe actuel">
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
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="abo">
                <div class="container">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Avantages compte PRENIUM</h3>
                        </div>
                        <div class="panel panel-default bootcards-summary">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-4 cardAbo">
                                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                            <h4>Accès VIP = pas d'accès lors des évènements</h4>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 cardAbo">
                                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                                            <h4>Des exclusivités sur des produits</h4>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 cardAbo">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                            <h4>Accès aux évènements de votre choix = pas de tirage au sort</h4>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 cardAbo">
                                            <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                                            <h4>Livraison gratuite à domicile des produits achetés (sous 24h)</h4>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 cardAbo">
                                            <span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
                                            <h4>Des bons de réduction exclusifs à valoir sur nos prochaines ventes</h4>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 cardAbo" id="subscribe">
                                            <span class=" glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                                            <h4>Inscription pour seulement 30€ !</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="WQH6PRWJHK35J">
                        <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                        <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </div>
        </div>

    </div>

    <br />
    <br />

<?php
include('template/footer.php');
