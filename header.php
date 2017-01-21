<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Le Classicarium</title>
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

            <div id="bs-example-navbar-collapse-1" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Musiciens
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="market.php?category=compositeurs">Compositeurs</a></li>
                            <li><a href="market.php?category=interpretes">Intérprètes</a></li>
                            <li><a href="market.php?category=chef_orchestre">Chef d'orchestres</a></li>
                            <li><a href="market.php?category=orchestres">Orchestres</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Epoque <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
                            <li class="dropdown-submenu">
                                <a href="market.php?category=epoque&initiale=compo" class="dropdown-toggle" data-toggle="dropdown">Compositeurs</a>
                                <ul class="dropdown-menu">
                                    <li><a href="market.php?category=epoqueC&initiale=A">Antiquité</a></li>
                                    <li><a href="market.php?category=epoqueC&initiale=MA">Moyen-Age</a></li>
                                    <li><a href="market.php?category=epoqueC&initiale=XVI">XVIe siècle</a></li>
                                    <li><a href="market.php?category=epoqueC&initiale=XVII">XVIIe siècle</a></li>
                                    <li><a href="market.php?category=epoqueC&initiale=XVIII">XVIIIe siècle</a></li>
                                    <li><a href="market.php?category=epoqueC&initiale=XIX">XIXe siècle</a></li>
                                    <li><a href="market.php?category=epoqueC&initiale=XX">XXe siècle</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="market.php?category=epoque&initiale=inter" class="dropdown-toggle" data-toggle="dropdown">Interprètes</a>
                                <ul class="dropdown-menu">
                                    <li><a href="market.php?category=epoqueI&initiale=0">Avant 1900</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1900">1900-1910</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1910">1910-1920</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1920">1920-1930</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1930">1930-1940</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1940">1940-1950</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1950">1950-1960</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1960">1960-1970</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1970">1970-1980</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1980">1980-1990</a></li>
                                    <li><a href="market.php?category=epoqueI&initiale=1990">Après 1990</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
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
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['nom']) || isset($_SESSION['prenom'])) {
                        if(isset($_GET['erreur']) && !empty($_GET['erreur'])) {
                            if ($_GET['erreur'] == 'chang') { ?>
                                <li><a href="#" data-trigger="focus" data-placement="bottom" type="button"
                                       data-toggle="popover" title="Erreur Changement"
                                       data-content="Impossible d'effectuer les changements. Le mot de passe était différent de sa confirmation."></a>
                                </li>
                            <?php }
                        } ?>
                        <li><a href="#" data-toggle="modal" data-target="#infoCompte">Mon Compte</a></li>
                    <?php }

                    else { ?>
                        <?php
                        if(isset($_GET['erreur']) && !empty($_GET['erreur'])) {
                            if($_GET['erreur']=='pass') { ?>
                                <li><a href="#" data-trigger="focus" data-placement="bottom" type="button" data-toggle="popover" title="Erreur Inscription" data-content="L'inscription a échouée. Le mot de passe était différent de sa confirmation."></a></li>
                            <?php }
                            else if($_GET['erreur']=='auth') { ?>
                                <li><a href="#" data-trigger="focus" data-placement="bottom" type="button" data-toggle="popover" title="Erreur Authentification" data-content="Le login ou le mot de passe est incorect."></a></li>
                            <?php }
                        } ?>
                        <li><a href="#" data-toggle="modal" data-target="#connexion">Connexion</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!--- MODAL CONNEXION -->
<?php include "data/ModalConnexion.php" ?>

<!-- MODAL INFORMATIONS COMPTE -->
<?php include "data/ModalCompte.php" ?>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="popover"]').popover('show');
    })
</script>

<!------------------------------------BODY --------------------------------------->
