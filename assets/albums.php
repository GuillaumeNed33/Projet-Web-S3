<?php

$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$query = "SELECT Code_Album, Titre_Album, ASIN 
          FROM ALBUM
          WHERE Code_Musicien = :CODE";
if(isset($queries[$_GET['Code']])) {
    $stmt =  $dbh->prepare();
    $stmt->execute(array(':CODE' => $code));
} else {
    header('Location: error.php');
}

include("header.php"); ?>
<main class="container-fluid">
    <div class="page-header">
        <ul class="list-group">
            <?php
            while($row = $stmt->fetch()) { //echo $row['Code_Musicien'] ?>
                <li class='list-group-item'>
                    <img class="img-rounded" src="imageAlbum.php?Code=<?php echo $row['Code_Album']?>">
                    <span> <?php echo $row['Nom_Musicien'] ?> </span>
                    <span> <?php echo $row['Nom_Musicien'] ?> </span>
                    <span><a href="albums.php?code=<?php echo $row['Code_Musicien'] ?>">Voir les albums</a></span>
                </li>
            <?php } ?>
        </ul>
    </div>
</main>
<?php include("footer.php");?>