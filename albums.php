<?php

$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$query = [
  'compositeurs' =>"SELECT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Interpréter ON Interpréter.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Instrument ON Instrument.Code_Instrument = Interpréter.Code_Instrument
  INNER JOIN Instrumentation ON Instrument.Code_Instrument = Instrumentation.Code_Instrument
  INNER JOIN Oeuvre ON Oeuvre.Code_Oeuvre = Instrumentation.Code_Oeuvre
  INNER JOIN Composer ON Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
  INNER JOIN Musicien ON Musicien.Code_Musicien = Composer.Code_Musicien
  WHERE Code_Musicien = :CODE",

  'interpretes' =>"SELECT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Interpréter ON Interpréter.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Musicien ON Musicien.Code_Musicien = Interpréter.Code_Musicien
  WHERE Code_Musicien = :CODE",

  'chef_orchestre' => "SELECT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Direction ON Direction.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Musicien ON Musicien.Code_Musicien = Direction.Code_Musicien
  WHERE Code_Musicien = :CODE",

  'orchestres' => "SELECT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Direction ON Direction.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Orchestres ON Orchestres.Code_Orchestre = Direction.Code_Orchestre
  WHERE Code_Orchestre = :CODE",

  'instruments' => "SELECT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album
  INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
  INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
  INNER JOIN Interpréter ON Interpréter.Code_Morceau = Enregistrement.Code_Morceau
  INNER JOIN Instrument ON Instrument.Code_Instrument = Interpréter.Code_Instrument
  WHERE Code_Instrument = :CODE",

  'genre' => "SELECT Album.Code_Album, Titre_Album, ASIN FROM ALBUM
  INNER JOIN Genre ON Genre.Code_Genre = Album.Code_Genre
  WHERE Genre.Code_Genre = :CODE"
];

if(isset($_GET['category']) && isset($_GET['code'])) {
  $stmt =  $dbh->prepare($query[$_GET['category']]);
  $stmt->execute(array(':CODE' => $_GET['code']));
} else {
  header('Location: error.php');
}
include "data/AmazonRequest.php";
include "header.php"; ?>

<main class="container-fluid">
  <div class="page-header">
    <ul class="list-group">
      <?php
      while($row = $stmt->fetch()) { ?>
        <li class='list-group-item'>
          <img class="img-rounded" src="imageAlbum.php?Code=<?php echo $row['Code_Album']?>">
          <span> <?php echo $row['Titre_Album'] ?> </span>
          <ul class="bouton-album">
            <li><a href="detail.php?code=<?php echo $row['Code_Album']."&ASIN=".$row['ASIN'] ?>" class="btn btn-info">Écouter</a></li>
            <li><a href="#" class="btn btn-primary">Ajouteur au panier</a></li>
          </ul>
        <?php }

        ?>
      </ul>
    </div>
  </main>
  <?php include("footer.php");?>
