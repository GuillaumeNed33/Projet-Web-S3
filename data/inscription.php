<?php
if($_POST['passRegister'] == $_POST['passConf1']) {
    $dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
    $requete = "INSERT INTO Abonné(Nom_Abonné, Prénom_Abonné, Login, Password, Adresse, Ville, Code_Postal, Email) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $dbh->prepare($requete);
    $stmt->execute(
        array(
            $_POST['nom1'],
            $_POST['prenom1'],
            $_POST['loginRegister'],
            $_POST['passRegister'],
            $_POST['adresse1'],
            $_POST['ville1'],
            $_POST['code1'],
            $_POST['mail1']
        )
    );
    $dbh = null;
    if($_SERVER[HTTP_REFERER] == 'http://info-timide.iut.u-bordeaux.fr/perso/2017/gnedelec001/Projet/error.php?erreur=pass' ||
        $_SERVER[HTTP_REFERER] == 'http://info-timide.iut.u-bordeaux.fr/perso/2017/gnedelec001/Projet/error.php?erreur=auth' ||
        $_SERVER[HTTP_REFERER] == 'http://info-timide.iut.u-bordeaux.fr/perso/2017/gnedelec001/Projet/error.php?erreur=chang') {
        header ("Location: ../index.php" );
    }
    else
        header ("Location:$_SERVER[HTTP_REFERER]" );
}
else {
    header ("Location: ../error.php?erreur=pass" );
}
?>
