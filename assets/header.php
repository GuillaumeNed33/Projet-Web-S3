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
          <a class="navbar-brand" href="index.php">Projet Web</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alphabétique<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Compositeurs</a></li>
                <li><a href="#">Interprètes</a></li>
                <li><a href="#">Chefs d'Orchestre</a></li>
                <li><a href="#">Orchestres</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Epoque<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href"#">Compositeurs</a></li>
                <li><a href="#">Interprètes</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Instruments</a>
            </li>
            <li>
              <a href="#">Genre</a>
            </li>
            <li>
              <a href="contact.php">À propos</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php include("data/connexion.php"); ?>
            <?php if(isset($_SESSION['nom']) && isset($_SESSION['prenom']))
            { ?>
              <li><a href="#" data-toggle="modal" data-target="#infoCompte">Mon Compte</a></li>
              <?php
            }
            else
            { ?>
              <li><a href="#" data-toggle="modal" data-target="#connexion">Connexion</a></li>
              <?php
            }
            ?>
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
          <form action="index.php" method="post">
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
              <input type="text" class="form-control" placeholder="Login" aria-describedby="basic-addon1">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span>
              <input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
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
        <li><a href="data/disconnect.php">Se deconnecter</a></li>
      </div>
    </div>
  </div>
</div>

  <script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
  })
  </script>
