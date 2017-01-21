<div class="modal fade" id="infoCompte" tabindex="-1" role="dialog" aria-labelledby="infoCompteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="glyphicon glyphicon-user"></h1>
                <h1 class="modal-title" id="infoCompteLabel"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></h1>
            </div>
            <div class="modal-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Mon Panier <span class="badge"><?php echo count($_SESSION['panier']);?></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <?php if(count($_SESSION['panier']) != 0) { ?>
                                    AFFICHER LES ALBUMS
                                <?php }
                                else {
                                    echo "Votre panier est vide.";
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Mes Informations
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form action="data/modifAbonne.php" method="post">
                                    <label>Nom :  </label><?php echo $_SESSION['nom'];?><br>
                                    <label>Prénom :  </label><?php echo $_SESSION['prenom'];?><br>
                                    <label>Login</label><input class="form-control" value='<?php echo $_SESSION['login'];?>' name="login2" type="text" required>
                                    <label>Password</label><input class="form-control" value='<?php echo $_SESSION['password'];?>' name="pass2" type="password" required>
                                    <label>Confirmation Password</label><input class="form-control" value='<?php echo $_SESSION['password'];?>' name="passConf2" type="password" required>
                                    <label>Adresse</label><input class="form-control" value='<?php echo $_SESSION['adresse'];?>' name="adresse2" type="text">
                                    <label>Code Postal</label><input class="form-control" value='<?php echo $_SESSION['codepostal'];?>' name="code2" type="text">
                                    <label>Ville</label><input class="form-control" value='<?php echo $_SESSION['ville'];?>' name="ville2" type="text">
                                    <label>E-mail</label><input class="form-control" value='<?php echo $_SESSION['mail'];?>' name="mail2" type="text">
                                    <div class="text-right" style="margin-top: 15px;">
                                        <button class="btn btn-primary" type="submit" name="action">Enregistrer les modifications<i class="glyphicon glyphicon-chevron-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="data/disconnect.php"><button type="button" class="btn btn-danger">Se deconnecter</button></a>
                </div>
            </div>
        </div>
    </div>
</div>