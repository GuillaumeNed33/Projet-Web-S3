<?php
session_start();

if(isset($_POST['login']) && isset($_POST['pass']))
{
    // Paramètres de connexion
    $_SESSION['nom'] = "";
    $_SESSION['prenom'] = "";

    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
    // Chaîne de connexion
    $pdodsn = "$driver:Server=$host;Database=$nomDb";
    // Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    $requete = "SELECT DISTINCT Code_Abonnée, Nom_Abonné, Prénom_Abonné
  FROM Abonné
  WHERE Login = ? AND Password = ?";

    $stmt = $pdo->prepare($requete);
    $stmt->execute(array($_POST['login'],$_POST['pass']));

    $reader = $stmt->fetch(PDO::FETCH_BOTH);
    $_SESSION['code'] = $reader[0];
    $_SESSION['nom'] = $reader[1];
    $_SESSION['prenom'] = $reader[2];

    $pdo = null;
}

header ("Location: $_SERVER[HTTP_REFERER]" );