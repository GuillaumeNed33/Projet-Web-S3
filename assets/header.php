<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Projet Web</title>
    <!-------------------------------------META----------------------------------------->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---------------------------------STYLESHEET--------------------------------------->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!------------------------------------FAVICON--------------------------------------->
    <link rel="icon" href="img/favicon.png">
    <!------------------------------------SCRIPTS--------------------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<!------------------------------------HEADER--------------------------------------->
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logoW.png"></a>
            </div>

            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alphabétique<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
                            <li class="dropdown-submenu">
                                <a href="market.php?category=compositeurs" class="dropdown-toggle" data-toggle="dropdown">Compositeurs</a>
                                <ul class="dropdown-menu">
                                    <?php for($alpha = 65; $alpha != 91; $alpha++) { ?>
                                        <li><a href="market.php?category=compositeurs&initiale=<?php echo chr($alpha);?>"><?php echo chr($alpha);?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="market.php?category=interpretes" class="dropdown-toggle" data-toggle="dropdown">Interprètes</a>
                                <ul class="dropdown-menu">
                                    <?php for($alpha = 65; $alpha != 91; $alpha++) { ?>
                                        <li><a href="market.php?category=interpretes&initiale=<?php echo chr($alpha);?>"><?php echo chr($alpha);?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="market.php?category=chefs_orchestre" class="dropdown-toggle" data-toggle="dropdown">Chefs d'Orchestre</a>
                                <ul class="dropdown-menu">
                                    <?php for($alpha = 65; $alpha != 91; $alpha++) { ?>
                                        <li><a href="market.php?category=chefs_orchestre&initiale=<?php echo chr($alpha);?>"><?php echo chr($alpha);?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="market.php?category=orchestres" class="dropdown-toggle" data-toggle="dropdown">Orchestres</a>
                                <ul class="dropdown-menu">
                                    <?php for($alpha = 65; $alpha != 91; $alpha++) { ?>
                                        <li><a href="market.php?category=orchestres&initiale=<?php echo chr($alpha);?>"><?php echo chr($alpha);?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    <li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Epoque<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
                            <li class="dropdown-submenu">
                                <a href="market.php?category=epoque&initiale=compo" class="dropdown-toggle" data-toggle="dropdown">Compositeurs</a>
                                <ul class="dropdown-menu">
                                    <li><a href="market.php?category=epoque&initiale=A">Antiquité</a></li>
                                    <li><a href="market.php?category=epoque&initiale=MA">Moyen-Age</a></li>
                                    <li><a href="market.php?category=epoque&initiale=XVI">XVIe siècle</a></li>
                                    <li><a href="market.php?category=epoque&initiale=XVII">XVIIe siècle</a></li>
                                    <li><a href="market.php?category=epoque&initiale=XVIII">XVIIIe siècle</a></li>
                                    <li><a href="market.php?category=epoque&initiale=XIX">XIXe siècle</a></li>
                                    <li><a href="market.php?category=epoque&initiale=XX">XXe siècle</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="market.php?category=epoque&initiale=inter" class="dropdown-toggle" data-toggle="dropdown">Interprètes</a>
                                <ul class="dropdown-menu">
                                    <li><a href="market.php?category=epoque&initiale=1900">Avant 1900</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1910">1900-1910</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1920">1910-1920</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1930">1920-1930</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1940">1930-1940</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1950">1940-1950</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1960">1950-1960</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1970">1960-1970</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1980">1970-1980</a></li>
                                    <li><a href="market.php?category=epoque&initiale=1990">1980-1990</a></li>
                                    <li><a href="market.php?category=epoque&initiale=2000">Après 1990</a></li>
                                </ul>
                            </li>
                        </ul>
                    <li>
                    <li>
                        <a href="market.php?category=instruments">Instruments</a>
                    </li>
                    <li>
                        <a href="market.php?category=genre">Genre</a>
                    </li>
                    <li>
                        <a href="contact.php">À propos</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Rechercher">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['nom']) && isset($_SESSION['prenom'])) { ?>
                        <li><a href="#" data-toggle="modal" data-target="#infoCompte">Mon Compte</a></li>
                    <?php }
                    else { ?>
                        <li><a href="#" data-toggle="modal" data-target="#connexion">Connexion</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!--- MODAL CONNEXION -->
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
            </div>
            <div class="modal-footer">
                <a role="button" data-toggle="collapse" href="#collapseRegister" aria-expanded="false" aria-controls="collapseRegister"><b>Pas encore membre ? Inscris toi !</b></a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="submit" value="Submit" class="btn btn-primary">Connexion</button>
                <div class="collapsing" id="collapseRegister">
                    <div class="well">
                        <h2 class="text-center">Inscription</h2>
                        <form action="data/inscription.php" method="post" class="text-center">
                            <label id="Label1">Nom </label><input name="nom1" type="text"><br>
                            <label id="Label2">Prénom </label><input name="prenom1" type="text"><br>
                            <label id="Label3">Login </label><input name="loginRegister" type="text"><br>
                            <label id="Label4">Password </label><input name="passRegister" type="password"><br>
                            <label id="Label4Bis">Confirmation Password </label><input name="passConf1" type="password"><br>
                            <label id="Label5">Adresse * </label><input name="adresse1" type="text"><br>
                            <label id="Label6">Code Postal * </label><input name="code1" type="text"><br>
                            <label id="Label7">Ville * </label><input name="ville1" type="text"><br>
                            <label id="Label9">E-mail *</label><input name="mail1" type="text"><br>
                            Pays *
                            <select name="pays1" class="browser-default">
                                <option>LOL</option>
                                <option>LOL</option>
                                <option>LOL</option>
                                <option>LOL</option>
                            </select>
                            <div class="button">
                                <button class="btn btn-danger" type="reset" name="action">Effacer</button>
                                <button class="btn btn-primary" type="submit" name="action">Envoyer
                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL INFORMATIONS COMPTE -->
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
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Mes Informations
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form action="data/modifAbonne.php" method="post">
                                    <label id="Label12">Nom </label><input name="nom2" type="text"><br>
                                    <label id="Label22">Prénom </label><input name="prenom2" type="text"><br>
                                    <label id="Label32">Login </label><input name="login2" type="text"><br>
                                    <label id="Label42">Password </label><input name="pass2" type="password"><br>
                                    <label id="Label4Bis2">Confirmation Password </label><input name="passConf2" type="password"><br>
                                    <label id="Label52">Adresse * </label><input name="adresse2" type="text"><br>
                                    <label id="Label62">Code Postal * </label><input name="code2" type="text"><br>
                                    <label id="Label72">Ville * </label><input name="ville2" type="text"><br>
                                    <label id="Label92">E-mail *</label><input name="mail2" type="text"><br>
                                    Pays *
                                    <select name="pays2" class="browser-default">
                                        <option>LOL</option>
                                        <option>LOL</option>
                                        <option>LOL</option>
                                        <option>LOL</option>
                                    </select>
                                    <div class="text-right" style="margin-top: 15px;">
                                        <button class="btn btn-danger" type="reset" name="action">Annuler</button>
                                        <button class="btn btn-primary" type="submit" name="action">Enregistrer les modifications<i class="glyphicon glyphicon-chevron-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Mon Panier
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Votre panier est vide.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <a href="data/disconnect.php"><button type="button" class="btn btn-danger">Se deconnecter</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
    $('.collapse').collapse()
</script>
