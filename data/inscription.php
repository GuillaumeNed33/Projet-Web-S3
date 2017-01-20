<?php
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$requete = "INSERT INTO Abonné(Nom_Abonné, Prenom_Abonné, Login, Password) VALUES (?,?,?,?)";
$stmt = $dbh->prepare($requete);
$stmt->execute(array($_POST['nom1'],$_POST['prenom1'],$_POST['loginRegister'], $_POST['passRegister']));

header ("Location: $_SERVER[HTTP_REFERER]" );
?>
