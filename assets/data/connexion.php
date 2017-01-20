<?php
session_start();
function Connexion() {

}
if(isset($_POST['login']) && isset($_POST['pass']))
{
  // Paramètres de connexion
  $_SESSION['nom'] = "";
  $_SESSION['prenom'] = "";

  $dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
  $requete = "SELECT DISTINCT Nom_Abonné, Prénom_Abonné, Abonné.Code_Abonné
  FROM Abonné
  WHERE Login = :LOGIN AND Password = :PASSWORD";
  $stmt =  $dbh->prepare($requete);
  $stmt->bindParam(":LOGIN",$_POST['login']);
  $stmt->bindParam(":PASSWORD", $_POST['pass']);
  $stmt->execute();
  $reader = $stmt->fetch();
  if(isset($reader)) {
      $_SESSION['code'] = $reader[2];
      $_SESSION['nom'] = $reader[0];
      $_SESSION['prenom'] = $reader[1];
      $_SESSION['panier']= array();
  }
  else {

  }

  $dbh = null;
}

header ("Location: $_SERVER[HTTP_REFERER]" );
?>
