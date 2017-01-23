<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 23/01/2017
 * Time: 03:02
 */
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$date = [
    '0' => '1900',
    '1900' => '1910',
    '1910' => '1920',
    '1920' => '1930',
    '1930' => '1940',
    '1940' => '1950',
    '1950' => '1960',
    '1960' => '1970',
    '1970' => '1980',
    '1980' => '1990',
    '1990' => '2017'
];

$epoque = [
    'A' => array('-3500','476'),
    'MA' => array('476','1499'),
    'XVI' => array('1500','1599'),
    'XVII' => array('1600','1699'),
    'XVIII' => array('1700','1799'),
    'XIX' => array('1800','1899'),
    'XX' => array('1900','2017'),
];

$title = [
    'compositeurs' => "Compositeurs",
    'interpretes' => "Interprètes",
    'chef_orchestre' => "Chefs d'orchestre",
    'orchestres' => "Orchestres",
    'epoqueI' => "Interprètes (Par Epoque)",
    'epoqueC' => "Compositeurs (Par Epoque)",
    'instruments' => "Instruments",
    'genre' => "Genre",
];

$queries = [
    'compositeurs' => "SELECT DISTINCT Musicien.Code_Musicien, Prénom_Musicien, Nom_Musicien
  FROM Musicien
  INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
  WHERE Musicien.Nom_Musicien LIKE :INITIAL;" ,

    'interpretes' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
  WHERE Nom_Musicien LIKE :INITIAL;" ,

    'chef_orchestre' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Direction ON Musicien.Code_Musicien = Direction.Code_Musicien
  INNER JOIN Orchestres ON Direction.Code_Orchestre = Orchestres.Code_Orchestre
  WHERE Nom_Musicien LIKE :INITIAL;" ,

    'orchestres' => "SELECT DISTINCT Code_Orchestre, Nom_Orchestre
  FROM Orchestres
  WHERE Nom_Orchestre LIKE :INITIAL;" ,

    'epoqueC' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
  WHERE Année_Naissance >= :INITIAL and Année_Naissance < :DATE_FIN ;" ,

    'epoqueI' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
  WHERE Année_Naissance >= :INITIAL and Année_Naissance < :DATE_FIN ;" ,

    'instruments' => "SELECT DISTINCT Code_Instrument, Nom_Instrument
  FROM Instrument
  WHERE Nom_Instrument LIKE :INITIAL;" ,

    'genre' => "SELECT DISTINCT Code_Genre, Libellé_Abrégé
  FROM Genre
  WHERE Libellé_Abrégé LIKE :INITIAL;"
];
?>