<?php
include "data/AmazonRequest.php";

$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");

$query = "SELECT Enregistrement.Titre, Enregistrement.Code_Morceau, Enregistrement.Durée, Enregistrement.Prix 
                FROM Album
                INNER JOIN Disque ON Album.Code_Album = Disque.Code_Album
                INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
                INNER JOIN Enregistrement ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                WHERE Album.Code_Album =:CODE";

$genreQuery = "SELECT Libellé_Abrégé
                FROM Genre
                INNER JOIN Album ON Album.Code_Genre = Genre.Code_Genre
                WHERE Album.Code_Album =:CODE";

$anneeQuery = "SELECT Année_Album
                FROM Album
                WHERE Album.Code_Album =:CODE";

if(isset($_GET['code'])) {
    $stmt = $dbh->prepare($genreQuery);
    $stmt->execute(array(':CODE' => $_GET['code']));
    $reader = $stmt->fetch();
    $genre = $reader[0];

    $stmt = $dbh->prepare($anneeQuery);
    $stmt->execute(array(':CODE' => $_GET['code']));
    $reader = $stmt->fetch();
    $annee = $reader[0];

    $stmt = $dbh->prepare($query);
    $stmt->execute(array(':CODE' => $_GET['code']));
}
else {
    header('Location: error.php');
}

if(isset($_GET['ASIN'])) {
    $response = $client->responseGroup('Large')->lookup($_GET['ASIN']);

    $price =  (isset($response->Items->Item->ItemAttributes->ListPrice->Amount))?$response->Items->Item->ItemAttributes->ListPrice->Amount:"indisponible";
    $title = (isset($response->Items->Item->ItemAttributes->Title))?$response->Items->Item->ItemAttributes->Title:"[No Title set]";
    $url = (isset($response->Items->Item->DetailPageURL))?$response->Items->Item->DetailPageURL:"";
    $panelPrice = $panelTitle  = "default";
    $panelURL = "success";
    $panier = "primary";

    if(!isset($response->Items->Item->ItemAttributes->ListPrice->Amount)) {
        $panelPrice = "danger";
        $panier = "danger disabled";
    }
    if(!isset($response->Items->Item->ItemAttributes->Title)) {
        $panelTitle = "danger";
    }
    if(!isset($response->Items->Item->DetailPageURL)) {
        $panelURL = "danger disabled";
    }
} else {
    header('Location: error.php');
}

include "header.php"
?>
<main class="container">
    <div style="margin-top: 25px;" class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>Pochette</strong></div>
                <div class="panel-body">
                    <img id="thumbnail" class="text-center img-rounded" src="data/imageAlbum.php?Code=<?php echo $_GET['code']?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-<?php echo $panelTitle;?>">
                <div class="panel-heading text-center"><strong>Titre</strong></div>
                <div class="panel-body text-center">
                    <?php echo $title; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-<?php echo $panelPrice;?>">
                <div class="panel-heading text-center"><strong>Prix</strong></div>
                <div class="panel-body text-center" style="font-size: 24px;">
                    <?php
                    if($price != 'indisponible') {
                        $price = $price/100;
                        echo $price." €";
                    }
                    else { echo $price;}
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>Détails</strong></div>
                <div class="panel-body text-center">
                    <?php echo "<p><b>Genre : </b>" . $genre; ?><br>
                    <?php echo "<b>Année : </b>" . $annee ."</p>"; ?>
                    <a class="btn btn-<?php echo $panelURL;?> row" target="_blank" href="<?php echo $url;?>">Voir sur Amazon</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-<?php echo $panelPrice;?>">
                <div class="panel-heading text-center"><strong>Acheter</strong></div>
                <div class="panel-body">
                    <form method="post" class="form-inline">
                        <div class="text-center">
                            <label for="quantity" class="row">Quantité</label>
                            <div class="row">
                                <center>
                                    <input id="quantity" type="number" placeholder="1" class="form-control">
                                </center>
                            </div>

                            <a  style="margin-top: 15px;" type="submit" class="btn btn-<?php echo $panier;?> row" href="#">Ajouter au panier</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingEnregis">
                    <a role="button" data-toggle="collapse" href="#collapseEnregist" aria-expanded="true" aria-controls="collapseEnregist" style="color:white;">
                        <strong>Enregistrements</strong>
                    </a>
                </div>
                <div id="collapseEnregist" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEnregis">
                    <div class="panel-body">
                        <?php
                        while($row = $stmt->fetch()) {
                            ?>
                            <div class="row" style="margin-bottom: 35px;">
                                <div class="text-center col-lg-5">
                                    <b><?php echo $row['Titre']; ?></b><br>(<?php echo $row[2]; ?>)
                                </div>
                                <div class="col-lg-2">
                                    <center>
                                        <audio controls>
                                            <source src="data/AudioEnregistrement.php?Code=<?php echo $row['Code_Morceau'] ?>" type="audio/mpeg">
                                        </audio>
                                    </center>
                                </div>
                                <div class="col-lg-offset-1 col-lg-2">
                                    <center>
                                        <?php echo $row['Prix']; ?> €
                                    </center>
                                </div>
                                <div class="col-lg-2">
                                    <center>
                                        <a class="btn btn-primary row" href="#">Ajouter au panier</a>
                                    </center>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $('.collapse').collapse()
</script>

<?php include "footer.php" ?>
