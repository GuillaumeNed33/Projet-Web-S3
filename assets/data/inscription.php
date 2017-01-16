<?php
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$requete = "INSERT INTO Abonné(Nom_Abonné, Prénom_Abonné, Login, Password) VALUES (?,?,?,?)";
$stmt = $dbh->prepare($requete);
$stmt->execute(array($_POST['nom'],$_POST['prenom'],$_POST['login'], $_POST['pass']));

header ("Location: $_SERVER[HTTP_REFERER]" );
?>