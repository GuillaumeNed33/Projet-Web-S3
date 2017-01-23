<?php
session_start();

if($_POST['passRegister'] == $_POST['passConf1']) {
    /* INSCRIPTION */
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

    /* CONNEXION */
    $dbh2 = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
    $query = "SELECT DISTINCT Nom_Abonné, Prénom_Abonné, Abonné.Code_Abonné, Adresse, Ville, Code_Postal, Email FROM Abonné WHERE Login = :LOGIN AND Password = :PASSWORD";
    $stmt2 =  $dbh2->prepare($query);
    $stmt2->bindParam(":LOGIN",$_POST['loginRegister']);
    $stmt2->bindParam(":PASSWORD", $_POST['passRegister']);
    $stmt2->execute();
    $reader = $stmt2->fetch();
    $dbh2 = null;

    $_SESSION['nom'] = $reader[0];
    $_SESSION['prenom'] = $reader[1];
    $_SESSION['code'] = $reader[2];
    $_SESSION['login'] = $_POST['loginRegister'];
    $_SESSION['password'] = $_POST['passRegister'];
    $_SESSION['adresse'] = $reader[3];
    $_SESSION['ville'] = $reader[4];
    $_SESSION['codepostal'] = $reader[5];
    $_SESSION['mail'] = $reader[6];

    //PANIER
    $_SESSION['panier']= array();
    $_SESSION['panier']['album'] = array();
    $_SESSION['panier']['enregistrement'] = array();

    /* RESIRECTION  */
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
