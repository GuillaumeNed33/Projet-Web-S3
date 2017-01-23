<?php
require_once "album.php";
require_once "Enregistrement.php";
session_start();
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");

$queryAlb = "SELECT DISTINCT Album.Code_Album, Titre_Album, Année_Album, Pochette, ASIN 
  FROM ALBUM
  WHERE Album.Code_Album = :CODE";

$queryEnr = "SELECT DISTINCT Enregistrement.Code_Morceau, Titre, Durée FROM Enregistrement
  WHERE Enregistrement.Code_Morceau = :CODE";

if(isset($_SESSION['panier'])) {

    if (isset($_GET['action']) && isset($_GET['code'])) {
        $prix = (isset($_GET['prix']))?$_GET['prix']:1;

        switch ($_GET['action']) {
            case 'ajoutAlbum':
                $stmt =  $dbh->prepare($queryAlb);
                $stmt->execute(array(':CODE' => $_GET['code']));
                $reader = $stmt->fetch();
                $album = new Album($reader[0], $reader[1], $reader[2], $reader[4], $prix);
                ajouterAlbum($album);
                break;

            case 'ajoutEnregistrement':
                $stmt =  $dbh->prepare($queryEnr);
                $stmt->execute(array(':CODE' => $_GET['code']));
                $reader = $stmt->fetch();
                $enregistrement = new Enregistrement($reader[0], $reader[1], $reader[2], $prix);
                ajouterEnregistrement($enregistrement);
                break;

            case 'supprAlbum':
                $stmt =  $dbh->prepare($queryAlb);
                $stmt->execute(array(':CODE' => $_GET['code']));
                $reader = $stmt->fetch();
                $album = new Album($reader[0], $reader[1], $reader[2], $reader[4], $prix);
                supprAlbum($album);
                break;

            case 'supprEnregistrement':
                $stmt =  $dbh->prepare($queryEnr);
                $stmt->execute(array(':CODE' => $_GET['code']));
                $reader = $stmt->fetch();
                $enregistrement = new Enregistrement($reader[0], $reader[1], $reader[2], $prix);
                supprEnregistrement($enregistrement);
                break;
        }
        $dbh = null;
    }
}

header("Location:$_SERVER[HTTP_REFERER]" );

function ajouterAlbum(Album $alb) {
    if($alb->exist($_SESSION['panier']['album']) == false)
        array_push($_SESSION['panier']['album'], $alb);
}

function ajouterEnregistrement(Enregistrement $enr) {
    if($enr->exist($_SESSION['panier']['enregistrement']) == false)
        array_push($_SESSION['panier']['enregistrement'], $enr);
}

function supprAlbum(Album $alb) {
    unset($_SESSION['panier']['album'][array_search($alb, $_SESSION['panier']['album'])]);
}

function supprEnregistrement(Enregistrement $enr) {
    unset($_SESSION['panier']['enregistrement'][array_search($enr, $_SESSION['panier']['enregistrement'])]);
}

?>
