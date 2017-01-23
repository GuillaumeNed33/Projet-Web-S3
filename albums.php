<?php
require_once "data/albumRequests.php";

if(isset($_GET['category']) && isset($_GET['code'])) {
    $stmt =  $dbh->prepare($artists[$_GET['category']]);
    $stmt->execute(array(':CODE' => $_GET['code']));
    $reader = $stmt->fetch();
    $name = $reader[0];
    $prenom = "";
    if($_GET['category']=='compositeurs' || $_GET['category']=='interpretes' || $_GET['category']=='chef_orchestre')
    {$prenom = $reader[1];}
    $stmt =  $dbh->prepare($query[$_GET['category']]);
    $stmt->execute(array(':CODE' => $_GET['code']));
} else {
    header('Location: error.php');
}
include "data/AmazonRequest.php";
include "header.php"; ?>

<main class="container">
    <div class="page-header">
        <h1 class="header text-center">Album(s) de <?php echo $prenom . " " . $name ;?></h1>
    </div>
    <div class="data">
        <ul class="list-group">
            <?php
            $empty = true;
            while($row = $stmt->fetch()) { $empty=false;?>
                <a href="detail.php?code=<?php echo $row['Code_Album']."&ASIN=".$row['ASIN']; ?>">
                    <li class='list-group-item row'>
                        <img style="max-width: 200px;" class="img-rounded col-lg-4" src="data/imageAlbum.php?Code=<?php echo $row['Code_Album']?>">
                        <div class="element col-lg-offset-1 col-lg-7">
                            <span> <?php echo $row['Titre_Album'] ?> </span>
                        </div>
                    </li>
                </a>
            <?php }
            if($empty) {
                echo "<p style='font-size:24px;'>Aucun albums n'existe pour votre selection.</p>";
            }
            ?>
        </ul>
    </div>
</main>
<?php include("footer.php");?>
