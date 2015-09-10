<form method="post" id="connexion">
    <div class="col-sm-12">
        <h2> Login</h2>

        <div class="col-sm-12">
            <div id="loginErrorWrong" class="alert alert-danger hideBlock" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Mot de passe incorrect
            </div>
            <div id="loginErrorEmail" class="alert alert-danger hideBlock" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Veuillez saisir une adresse email valide
            </div>
            <input type="text" placeholder="Email" onclick="return false;" class="form-control input-sm" name="login"
                   id="inputError"/>
        </div>
        <br/>

        <div class="col-sm-12 password">
            <div id="loginErrorPwd" class="alert alert-danger hideBlock" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Veuillez saisir votre mot de passe actuel
            </div>
            <input type="password" placeholder="Password" class="form-control input-sm" name="pwd" id="Password1"/>
            <a class="forgotPasswordLink" href="#">Mot de passe oubli&eacute; ?</a>
        </div>
        <div class="col-sm-12" style="padding-top: 0px;">
            <span id="login" type="submit" class="btn btn-success btn-sm">Me&nbsp;&nbsp;connecter</span><br><br>
            <a class="inscriptionLink" href="registerForm.php">Cr&eacute;er mon compte ?</a>
        </div>
    </div>
</form>

<form method="post" id="forgotPassword" class="hideBlock">
    <div class="col-sm-12">
        <h3 class="forgotPWD"> Mot de passe oublié</h3>

        <div class="col-sm-12">
            <div id="forgotPwdSuccess" class="alert alert-success hideBlock" role="alert">
                Vous allez recevoir un mail avec votre mot de passe.
            </div>
            <section id="formForgotPassword">
                <div id="forgotPwdError" class="alert alert-danger hideBlock" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Veuillez saisir une adresse email valide
                </div>
                <input type="text" placeholder="Email" onclick="return false;" class="form-control input-sm" name="login"
                       id="inputError"/>
            </section>
        </div>
        <br/>

        <div class="col-sm-12" style="padding-top: 0px;">
            <span id="forgot" type="submit" class="btn btn-success btn-sm">Envoyer</span><br><br>
            <a class="backToLogin" href="#">Retour</a>
        </div>
    </div>
</form>