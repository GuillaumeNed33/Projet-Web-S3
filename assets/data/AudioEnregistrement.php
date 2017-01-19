<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 18/01/2017
 * Time: 19:29
 */
$pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$stmt = $pdo->prepare("SELECT Enregistrement.Titre,
                FROM Album
                INNER JOIN Disque ON Album.Code_Album = Disque.Code_Album
                INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
                INNER JOIN Enregistrement ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                WHERE Code_Album=?" );
$stmt->execute(array($_GET['Code']));
$stmt->bindColumn(1, $lob, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);
$audio = pack("H*", $lob);
header("Content-Type: audio/mpeg");
echo $audio;