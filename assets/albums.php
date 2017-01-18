<?php
require('AmazonECS.class.php');

$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$query = "SELECT Code_Album, Titre_Album, ASIN 
          FROM ALBUM
          /*WHERE Code_Musicien = :CODE*/";

if(isset($_GET['code'])) {
    $stmt =  $dbh->prepare($query);
    $stmt->execute(array(':CODE' => $_GET['code']));
} else {
    header('Location: error.php');
}


const Aws_ID = "AKIAIGAWZDBK7XI7UWPQ"; // Identifiant
const Aws_SECRET = "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"; //Secret
const associateTag="classicarium-21"; // AssociateTag
$client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
include("header.php"); ?>
<main class="container-fluid">
    <div class="page-header">
        <ul class="list-group">
            <?php
            while($row = $stmt->fetch()) { ?>
                <li class='list-group-item'>
                    <img class="pochette img-rounded" src="imageAlbum.php?Code=<?php echo $row['Code_Album']?>">
                    <span> <?php echo $row['Titre_Album'] ?> </span>
                    <?php
                    //$response = $client->responseGroup('Large')->lookup($row['ASIN']);
                    //echo $response->Items->Item->ASIN/*->$Items->$Item->$DetailPageURL*/;
                    ?>
                    <ul class="bouton-album">
                        <li><a data-toggle="modal" data-target="#enregistrement" class="btn btn-info">Écouter</a></li>
                        <li><a href="#" class="btn btn-primary">Ajouteur au panier</a></li>
                    </ul>
                </li>
            <?php }

            ?>
        </ul>
    </div>

    <div class="modal fade" id="enregistrement" tabindex="-1" role="dialog" aria-labelledby="enregistrementLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    SELECT Titre
                    FROM Album
                    INNER JOIN Disque ON Album.Code_Album = Disque.Code_Album
                    INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
                    INNER JOIN Enregistrement ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                </div>
                <div class="modal-body">
                    mooche 2
                </div>
        </div>
    </div>
</main>
<?php include("footer.php");?>