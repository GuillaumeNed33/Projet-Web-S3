<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 22/12/2016
 * Time: 19:01
 */
$alphabet = array();
foreach(range('A','z') as $i) {
    if (preg_match('#[A-Za-z]#',$i))
        $alphabet[] = $i;
}

if (in_array($_GET['initiale'], $alphabet)) {
    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';

// Chaîne de connexion
    $pdodsn = "$driver:Server=$host;Database=$nomDb";
// Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);

    $query = "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
    FROM Musicien
    INNER JOIN Composer ON Composer.Code_Musicien = Musicien.Code_Musicien
    WHERE Nom_Musicien LIKE '".$_GET['initiale']."%'";

    foreach ($pdo->query($query) as $row) {

    }
    $pdo = null;
}
else
{

}
?>