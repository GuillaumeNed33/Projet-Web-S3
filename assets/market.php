<?php
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");

$initial = "";
if(isset($_GET['initiale'])) {
    $initial = $_GET['initiale'];
}

$queries = [
    'compositeurs' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien
                      FROM Musicien INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien 
                      WHERE Nom_Musicien LIKE :INITIAL;" ,
    'interpretes' => "SELECT DISTINCT (Nom_Musicien),  FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    'chef_orchestre' => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    'orchestres' => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
];



if(isset($queries[$_GET['category']])) {
    $stmt =  $dbh->prepare($queries[$_GET['category']]);
    $stmt->execute(array(':INITIAL' => $initial.'%'));
    $stmt->bindColumn(1, $lob, PDO::PARAM_LOB);
} else {
    header('Location: error.php');
}

include("header.php"); ?>
    <main class="container-fluid">
        <div class="page-header">

            <div class="musicien">
                <ul class="list-group">
                    <li class="list-group-item">
                        <?php
                        foreach(range('A','Z') as $i) {
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                            if ($i != "Z") echo " | ";
                        }
                        ?>
                    </li>
                <?php
                    while($row = $stmt->fetch()) { //echo $row['Code_Musicien'] ?>
                        <li class='list-group-item'>
                            <img class="img-rounded" src="image.php?Code=<?php echo $row['Code_Musicien']?>">
                            <span> <?php echo $row['Nom_Musicien'] ?> </span>
                            <span> <?php echo $row['Nom_Musicien'] ?> </span>
                            <span><a href="albums.php?code=<?php echo $row['Code_Musicien'] ?>">Voir les albums</a></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </main>
<?php include("footer.php");?>