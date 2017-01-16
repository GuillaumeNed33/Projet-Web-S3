<?php
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");

$initial = "";
$alphabet = array();
foreach(range('A','z') as $i) {
    if (preg_match('#[A-Za-z]#',$i))
        $alphabet[] = $i;
}
if(isset($_GET['initiale'])) {
    $initial = $_GET['initiale'];
}

$queries = [
    'compositeurs' => "SELECT DISTINCT Musicien.Code_Musicien, Prénom_Musicien, Nom_Musicien FROM Musicien INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien WHERE Musicien.Nom_Musicien LIKE :INITIAL;" ,

    'interpretes' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
                      FROM Musicien 
                      INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien 
                      WHERE Nom_Musicien LIKE N'".$initial."';" ,

    'chef_orchestre' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
                      FROM Musicien 
                      INNER JOIN Direction ON Musicien.Code_Musicien = Direction.Code_Musicien
                      INNER JOIN Orchestres ON Direction.Code_Orchestre = Orchestres.Code_Orchestre 
                      WHERE Nom_Musicien LIKE N'".$initial."';" ,

    'orchestres' => "SELECT DISTINCT Code_Orchestre, Nom_Orchestre FROM Orchestre WHERE Nom_Orchestre LIKE N'".$initial."';" ,

    'epoqueC' => "SELECT DISTINCT Nom_Musicien FROM Musicien INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,

    'epoqueI' => "SELECT DISTINCT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,

    'instruments' => "SELECT DISTINCT Code_Instrument, Nom_Instrument FROM Instrument WHERE Nom_Instrument LIKE N'".$initial."';" ,

    'genre' => "SELECT DISTINCT Code_Genre, Libellé_Abrégé FROM Genre WHERE Libellé_Abrégé LIKE N'".$initial."';" ,
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
        <h1 class="header text-center"><?php echo $_GET['category'];?></h1>
        <div class="page-header">
            <ul class="list-group">
                <li class="list-group-item text-center">
                    <?php
                    switch ($_GET['category']) {
                        case 'compositeurs':
                            foreach(range('A','Z') as $i) {
                                echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                                if ($i != "Z") echo " | ";
                            }

                            break;
                        case 'interpretes':

                            foreach(range('A','Z') as $i) {
                                echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                                if ($i != "Z") echo " | ";
                            }
                            break;
                        case 'chef_orchestre':
                            foreach(range('A','Z') as $i) {
                                echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                                if ($i != "Z") echo " | ";
                            }

                            break;
                        case 'orchestres':
                            foreach(range('A','Z') as $i) {
                                echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                                if ($i != "Z") echo " | ";
                            }
                            break;
                        case 'epoqueC':
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=A'>Antiquité</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=MA'>Moyen-Age</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=XVI'>XVIe siècle</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=XVII'>XVIIe siècle</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=XVIII'>XVIIIe siècle</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=XIX'>XIXe siècle</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=XX'>XXe siècle et plus</a>";

                            break;
                        case 'epoqueI':
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1900'>Avant 1900</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1910'>1900-1910</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1920'>1910-1920</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1930'>1920-1930</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1940'>1930-1940</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1950'>1940-1950</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1960'>1950-1960</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1970'>1960-1970</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1980'>1970-1980</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1990'>1980-1990</a>  |  ";
                            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=2000'>Après 1990</a>";

                            break;
                        case 'instruments':
                            foreach(range('A','Z') as $i) {
                                echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                                if ($i != "Z") echo " | ";
                            }
                            break;
                        case 'genre':
                            foreach(range('A','Z') as $i) {
                                echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                                if ($i != "Z") echo " | ";
                            }
                            break;
                    }
                    ?>
                </li>
            </ul>
        </div>


        <div class="data">
            <ul class="list-group">
                <?php
                $empty = true;
                while($row = $stmt->fetch()) { $empty = false; ?>
                    <li class='list-group-item'>
                        <img class="img-rounded" src="imageMusicien.php?Code=<?php echo $row['Code_Musicien']?>">
                        <span> <?php echo $row['Prénom_Musicien'] ?> </span>
                        <span> <?php echo $row['Nom_Musicien'] ?> </span>
                        <span><a href="albums.php?code=<?php echo $row['Code_Musicien'] ?>">Voir les albums</a></span>
                    </li>
                <?php }
                if($empty) { echo "Aucun compositeur ne commence par \"" . $initial. "\"."; }
                ?>
            </ul>
        </div>
    </main>
<?php include("footer.php");?>