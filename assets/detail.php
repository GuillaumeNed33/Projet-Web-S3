<?php
include "data/AmazonRequest.php";

$query = "SELECT Enregistrement.Titre,
                FROM Album
                INNER JOIN Disque ON Album.Code_Album = Disque.Code_Album
                INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
                INNER JOIN Enregistrement ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                WHERE Code_Album =:CODE";
if(isset($_GET['ASIN'])) {
    $response = $client->responseGroup('Large')->lookup($_GET['ASIN']);
    if(isset($response)) {
        $price =  (isset($response->Items->Item->ItemAttributes->ListPrice->Amount))?$response->Items->Item->ItemAttributes->ListPrice->Amount:"indisponible";
    }
    else {
        $price = "indisponible";
    }
}


include "header.php"
?>
<main class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">Pochette</div>
                <div class="panel-body">
                    <img class="pochette img-rounded" src="imageAlbum.php?Code=<?php echo $_GET['code']?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Titre</div>
                <div class="panel-body">
                    <?php echo $row['Titre_Album']; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">Prix</div>
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
                <div class="panel-heading">Acheter</div>
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
            <div class="panel panel-default">
                <div class="panel-heading">Enregistrements</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="text-center col-lg-6">
                            <?php echo "titre" ?>
                        </div>
                        <div class="col-lg-6">
                            <audio controls>
                                <source src="AudioEnregistrement?Code=<?php echo $_GET['code'] ?>" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php"?>
