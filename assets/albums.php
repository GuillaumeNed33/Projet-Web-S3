<?php

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
include "data/AmazonRequest.php";
include"header.php"; ?>
<main class="container-fluid">
    <div class="page-header">
        <ul class="list-group">
            <?php
            while($row = $stmt->fetch()) { ?>
                <li class='list-group-item'>
                    <img class="img-rounded" src="imageAlbum.php?Code=<?php echo $row['Code_Album']?>">
                    <span> <?php echo $row['Titre_Album'] ?> </span>
                    <?php
                    $response = $client->responseGroup('Large')->lookup($row['ASIN']);
                    echo $response->Items->Item->ItemAttributes->ListPrice->Amount;
                    ?>
                    <ul class="bouton-album">
                        <li><a href="detail.php?code=<?php echo $row['Code_Album']."&ASIN=".$row['ASIN'] ?>" class="btn btn-info">Écouter</a></li>
                        <li><a href="#" class="btn btn-primary">Ajouteur au panier</a></li>
                    </ul>
                </li>
            <?php }

            ?>
        </ul>
    </div>
</main>
<?php include("footer.php");?>