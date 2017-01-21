<?php

$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$query = [
    'compositeurs' =>"SELECT DISTINCT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Interpréter ON Interpréter.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Instrument ON Instrument.Code_Instrument = Interpréter.Code_Instrument
  INNER JOIN Instrumentation ON Instrument.Code_Instrument = Instrumentation.Code_Instrument
  INNER JOIN Oeuvre ON Oeuvre.Code_Oeuvre = Instrumentation.Code_Oeuvre
  INNER JOIN Composer ON Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
  INNER JOIN Musicien ON Musicien.Code_Musicien = Composer.Code_Musicien
  WHERE Musicien.Code_Musicien = :CODE",

    'interpretes' =>"SELECT DISTINCT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Interpréter ON Interpréter.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Musicien ON Musicien.Code_Musicien = Interpréter.Code_Musicien
  WHERE Musicien.Code_Musicien = :CODE",

    'chef_orchestre' => "SELECT DISTINCT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Direction ON Direction.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Musicien ON Musicien.Code_Musicien = Direction.Code_Musicien
  WHERE Musicien.Code_Musicien = :CODE",

    'orchestres' => "SELECT DISTINCT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Direction ON Direction.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Orchestres ON Orchestres.Code_Orchestre = Direction.Code_Orchestre
  WHERE Orchestres.Code_Orchestre = :CODE",

    'instruments' => "SELECT DISTINCT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Interpréter ON Interpréter.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Instrument ON Instrument.Code_Instrument = Interpréter.Code_Instrument
  WHERE Instrument.Code_Instrument = :CODE",

    'genre' => "SELECT DISTINCT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Genre ON Genre.Code_Genre = Album.Code_Genre
  WHERE Genre.Code_Genre = :CODE"
];

$artists = [
    'compositeurs' => "SELECT DISTINCT  Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
  WHERE Musicien.Code_Musicien = :CODE;" ,

    'interpretes' => "SELECT DISTINCT Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
  WHERE Musicien.Code_Musicien = :CODE;" ,

    'chef_orchestre' => "SELECT DISTINCT Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Direction ON Musicien.Code_Musicien = Direction.Code_Musicien
  INNER JOIN Orchestres ON Direction.Code_Orchestre = Orchestres.Code_Orchestre
  WHERE Musicien.Code_Musicien = :CODE;" ,

    'orchestres' => "SELECT DISTINCT Nom_Orchestre
  FROM Orchestres
  WHERE Orchestres.Code_Orchestre = :CODE;" ,

    'instruments' => "SELECT DISTINCT Nom_Instrument
  FROM Instrument
  WHERE Code_Instrument = :CODE;" ,

    'genre' => "SELECT DISTINCT Libellé_Abrégé
  FROM Genre
  WHERE Code_Genre = :CODE;"
];

if(isset($_GET['category']) && isset($_GET['code'])) {
    $stmt =  $dbh->prepare($artists[$_GET['category']]);
    $stmt->execute(array(':CODE' => $_GET['code']));
    $reader = $stmt->fetch();
    $name = $reader[0];
    $prenom = "";
    if($_GET['category']=='compositeurs' || $_GET['category']=='interpretes' || $_GET['category']=='chef_orchestre')
    {$prenom = $reader[1];}
    $stmt =  $dbh->prepare($query[$_GET['category']]);
    $stmt->execute(array(':CODE' => $_GET['code']));
} else {
    header('Location: error.php');
}
include "data/AmazonRequest.php";
include "header.php"; ?>

<main class="container">
    <div class="page-header">
        <h1 class="header text-center">Album(s) de <?php echo $prenom . " " . $name ;?></h1>
    </div>
    <div class="data">
        <ul class="list-group">
            <?php
            $empty = true;
            while($row = $stmt->fetch()) { $empty=false;?>
                <a href="detail.php?code=<?php echo $row['Code_Album']."&ASIN=".$row['ASIN']; ?>">
                    <li class='list-group-item row'>
                        <img style="max-width: 200px;" class="img-rounded col-lg-4" src="data/imageAlbum.php?Code=<?php echo $row['Code_Album']?>">
                        <div class="element col-lg-offset-1 col-lg-7">
                            <span> <?php echo $row['Titre_Album'] ?> </span>
                        </div>
                    </li>
                </a>
            <?php }
            if($empty) {
                echo "<p style='font-size:24px;'>Aucun albums n'existe pour votre selection.</p>";
            }
            ?>
        </ul>
    </div>
</main>
<?php include("footer.php");?>
