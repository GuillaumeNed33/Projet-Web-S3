<?php
session_start();
if(isset($_POST['login']) && isset($_POST['pass']))
{
  $dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
  $requete = "SELECT DISTINCT Nom_Abonné, Prénom_Abonné, Abonné.Code_Abonné, Adresse, Ville, Code_Postal, Email
  FROM Abonné
  WHERE Login = :LOGIN AND Password = :PASSWORD";
  $stmt =  $dbh->prepare($requete);
  $stmt->bindParam(":LOGIN",$_POST['login']);
  $stmt->bindParam(":PASSWORD", $_POST['pass']);
  $stmt->execute();
  $reader = $stmt->fetch();
    $dbh = null;

  if(!empty($reader[2])) {
      $_SESSION['nom'] = $reader[0];
      $_SESSION['prenom'] = $reader[1];
      $_SESSION['code'] = $reader[2];
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['password'] = $_POST['pass'];
      $_SESSION['adresse'] = $reader[3];
      $_SESSION['ville'] = $reader[4];
      $_SESSION['codepostal'] = $reader[5];
      $_SESSION['mail'] = $reader[6];
      $_SESSION['panier']= array();

      if($_SERVER[HTTP_REFERER] == 'http://info-timide.iut.u-bordeaux.fr/perso/2017/gnedelec001/Projet/error.php?erreur=pass' ||
          $_SERVER[HTTP_REFERER] == 'http://info-timide.iut.u-bordeaux.fr/perso/2017/gnedelec001/Projet/error.php?erreur=auth' ||
          $_SERVER[HTTP_REFERER] == 'http://info-timide.iut.u-bordeaux.fr/perso/2017/gnedelec001/Projet/error.php?erreur=chang') {
          header ("Location: ../index.php" );
      }
      else
          header("Location:$_SERVER[HTTP_REFERER]" );
  }
  else
      header("Location: ../error.php?erreur=auth" );
}


?>
