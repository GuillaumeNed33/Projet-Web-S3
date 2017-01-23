<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 23/01/2017
 * Time: 03:00
 */


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
?>