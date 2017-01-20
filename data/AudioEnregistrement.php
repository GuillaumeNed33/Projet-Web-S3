<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 18/01/2017
 * Time: 19:29
 */
$pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$stmt = $pdo->prepare("SELECT Enregistrement.Extrait, Code_Morceau
                FROM Enregistrement
                WHERE Code_Morceau=?" );
$stmt->execute(array($_GET['Code']));
$stmt->bindColumn(1, $lob, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);
$audio = pack("H*", $lob);
header("Content-Type: audio/mpeg");
echo $audio;