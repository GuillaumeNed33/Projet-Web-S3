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
          <a class="navbar-brand" href="index.php">Le Classicarium</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
          <form action="connexion.php" method="post">
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
              <input type="text" class="form-control" placeholder="Login" aria-describedby="basic-addon1" name="login">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span>
              <input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon2" name="pass">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

<!-- MODAL INFORMATIONS COMPTE -->
<div class="modal fade" id="infoCompte" tabindex="-1" role="dialog" aria-labelledby="infoCompteLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="infoCompteLabel"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></h4>
      </div>
      <div class="modal-body">

      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <<button><a href="data/disconnect.php">Se deconnecter</a></<button>
      </div>
    </div>
  </div>
</div>

  <script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
  })
  </script>
