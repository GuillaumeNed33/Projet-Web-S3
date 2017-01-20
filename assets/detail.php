<?php
include "data/AmazonRequest.php";

$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");

$query = "SELECT Enregistrement.Titre, Enregistrement.Code_Morceau
                FROM Album
                INNER JOIN Disque ON Album.Code_Album = Disque.Code_Album
                INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
                INNER JOIN Enregistrement ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                WHERE Album.Code_Album =:CODE";

if(isset($_GET['code'])) {
    $stmt = $dbh->prepare($query);
    $stmt->execute(array(':CODE' => $_GET['code']));
}

if(isset($_GET['ASIN'])) {
    $response = $client->responseGroup('Large')->lookup($_GET['ASIN']);
    if(isset($response)) {
        $price =  (isset($response->Items->Item->ItemAttributes->ListPrice->Amount))?$response->Items->Item->ItemAttributes->ListPrice->Amount:"indisponible";
        $title = (isset($response->Items->Item->ItemAttributes->Title))?$response->Items->Item->ItemAttributes->Title:"[No Title set]";
        $panel = "default";
    }
    else {
        echo "moche";
        die();
        $panel = "danger";
        $price = "indisponible";
        $title = "[No Title set]";
    }
}


include "header.php"
?>
<main class="container">
    <div style="margin-top: 25px;" class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Pochette</strong></div>
                <div class="panel-body">
                    <img id="thumbnail" class="text-center img-rounded" src="imageAlbum.php?Code=<?php echo $_GET['code']?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-<?php echo $panel?>">
                <div class="panel-heading"><strong>Titre</strong></div>
                <div class="panel-body">
                    <?php echo $title; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-<?php echo $panel?>">
                <div class="panel-heading"><strong>Prix</strong></div>
                <div class="panel-body">
                    <?php
                    $price = $price/100;
                    echo $price." €";
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Acheter</strong></div>
                <div class="panel-body">
                    <form method="post" class="form-inline">
                        <div class="text-center">
                            <label for="quantity">Quantité :</label>
                            <input id="quantity" type="number" placeholder="1" class="form-control">
                            <a type="submit" class="btn btn-primary" href="#">Ajouter au panier</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Enregistrements</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        while($row = $stmt->fetch()) {
                        ?>
                        <div class="text-center col-lg-6">
                            <?php echo $row['Titre']; ?>
                        </div>
                        <div class="col-lg-6">
                            <audio controls>
                                <source src="data/AudioEnregistrement.php?Code=<?php echo $row['Code_Morceau'] ?>" type="audio/mpeg">
                            </audio>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php"?>
