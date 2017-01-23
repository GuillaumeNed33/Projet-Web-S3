<?php
require_once "data/marketRequests.php";

$initial = "";
if(isset($_GET['initiale'])) {
    $initial = $_GET['initiale'];
}

if(isset($queries[$_GET['category']])) {
    $stmt =  $dbh->prepare($queries[$_GET['category']]);
    if($_GET['category'] == 'epoqueI')  {
        $stmt->execute(array(':INITIAL' => $initial, ':DATE_FIN' => $date[$initial]));
    }
    else if($_GET['category'] == 'epoqueC') {
        $stmt->execute(array(':INITIAL' => $epoque[$initial][0], ':DATE_FIN' => $epoque[$initial][1]));
    }
    else {
        $stmt->execute(array(':INITIAL' => $initial.'%'));
    }
}
else {
    header('Location: error.php');
}

include("header.php"); ?>
<main class="container">
    <h1 class="header text-center"><?php echo $title[$_GET['category']];?></h1>
    <div class="page-header">
        <ul class="list-group">
            <li class="list-group-item text-center">
                <?php
                switch ($_GET['category']) {
                    case 'epoqueC':
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=A'>Antiquité</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=MA'>Moyen-Age</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=XVI'>XVIe siècle</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=XVII'>XVIIe siècle</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=XVIII'>XVIIIe siècle</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=XIX'>XIXe siècle</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=XX'>XXe siècle et plus</a>";
                        break;

                    case 'epoqueI':
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=0'>Avant 1900</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1900'>1900-1910</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1910'>1910-1920</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1920'>1920-1930</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1930'>1930-1940</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1940'>1940-1950</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1950'>1950-1960</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1960'>1960-1970</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1970'>1970-1980</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1980'>1980-1990</a>  |  ";
                        echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=1990'>Après 1990</a>";
                        break;

                    default:
                        foreach(range('A','Z') as $i) {
                            echo "<a class='index' href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
                            if ($i != "Z") echo " | ";
                        }
                }
                ?>
            </li>
        </ul>
    </div>

    <div class="data">
        <ul class="list-group">
            <?php
            $empty = true;
            while($row = $stmt->fetch()) {
                $empty = false;

                if($_GET['category']=='orchestres') { ?>
                    <a class="element" href="albums.php?category=orchestres&code=<?php echo $row[0] ?>">
                        <li class='list-group-item'>
                            <span><?php echo $row[1];?></span>
                        </li>
                    </a>
                <?php }

                else if($_GET['category']=='instruments') { ?>
                    <a href="albums.php?category=instruments&code=<?php echo $row[0] ?>">
                        <li class='list-group-item row'>
                            <img class="picture col-lg-4" src="data/imageInstrument.php?Code=<?php echo $row[0]?>">
                            <div class="element col-lg-offset-1 col-lg-7">
                                <span> <?php echo $row[1]; ?> </span>
                            </div>
                        </li>
                    </a>
                <?php }

                else if($_GET['category']=='genre') { ?>
                    <a class="element" href="albums.php?category=genre&code=<?php echo $row[0] ?>">
                        <li class='list-group-item'>
                            <span> <?php echo $row[1]; ?> </span>
                        </li>
                    </a>
                <?php }

                else {
                    $url = $_GET['category'];
                    if($_GET['category'] == 'epoqueI') {$url = 'interpretes';}
                    else if($_GET['category'] == 'epoqueC'){$url = 'compositeurs';}
                    ?>
                    <a href="albums.php?category=<?php echo $url; ?>&code=<?php echo $row[0] ?>">
                        <li class='list-group-item row'>
                            <img class="picture col-lg-4" src="data/imageMusicien.php?Code=<?php echo $row[0]?>">
                            <div class="element col-lg-offset-1 col-lg-7">
                                <span> <?php echo "<b>" . $row[2] . "</b> " . $row[1]; ?> </span>
                            </div>
                        </li>
                    </a>
                <?php }
            }

            if($empty) {
                echo "<p style='font-size:24px;'>Aucun nom de " . $title[$_GET['category']] . " ne commence par \"" . $initial. "\".</p>";
            }
            $dbh = null;
            ?>
        </ul>
    </div>
</main>

<?php include("footer.php");?>
