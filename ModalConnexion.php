<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="connexionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="connexionLabel">Identifiez-vous</h4>
            </div>
            <div class="modal-body">
                <form action="data/connexion.php" method="post">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
                        <input type="text" class="form-control" placeholder="Login" aria-describedby="basic-addon1" name="login">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span>
                        <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" name="pass">
                    </div>
                    <div class="modal-footer">
                        <a role="button" data-toggle="collapse" href="#collapseRegister" aria-expanded="false" aria-controls="collapseRegister"><b>Pas encore membre ? Inscris toi !</b></a>
                        <button type="submit" value="Submit" class="btn btn-primary" style="margin-left: 10px;">Connexion</button>
                    </div>
                </form>
            </div>
            <div class="collapsing" id="collapseRegister">
                <div class="well">
                    <h2 class="text-center">Inscription</h2>
                    <form action="data/inscription.php" method="post" class="text-center" required>
                        <label>Nom*</label><input class="form-control" name="nom1" type="text" required>
                        <label>Prénom*</label><input class="form-control" name="prenom1" type="text" required>
                        <label>Login*</label><input class="form-control" name="loginRegister" type="text" required>
                        <label>Password*</label><input class="form-control" name="passRegister" type="password" required>
                        <label>Confirmation Password*</label><input class="form-control" name="passConf1" type="password">
                        <label>Adresse</label><input class="form-control" name="adresse1" type="text" required>
                        <label>Code Postal</label><input class="form-control" name="code1" type="text">
                        <label>Ville</label><input class="form-control" name="ville1" type="text">
                        <label>E-mail</label><input class="form-control" name="mail1" type="text">
                        Pays *
                        <select name="pays1" class="browser-default">
                            <option>LOL</option>
                            <option>LOL</option>
                            <option>LOL</option>
                            <option>LOL</option>
                        </select>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" name="action">Envoyer
                                <i class="glyphicon glyphicon-chevron-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>