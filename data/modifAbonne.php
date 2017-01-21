<?php session_start();
if($_POST['pass2'] == $_POST['passConf2']) {
    $dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
    $requete = "UPDATE Abonné SET Login = ?, Password = ?, Adresse = ?, Ville = ?, Code_Postal = ?, Email = ? WHERE Abonné.Code_Abonné = ?;";

    $stmt = $dbh->prepare($requete);
    $stmt->execute(
        array(
            $_POST['login2'],
            $_POST['pass2'],
            $_POST['adresse2'],
            $_POST['ville2'],
            $_POST['code2'],
            $_POST['mail2'],
            $_SESSION['code']
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
    header ("Location: ../error.php?erreur=chang" );
}
?>