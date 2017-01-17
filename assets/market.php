<?php
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");

$initial = "";
$date = [
  '0' => "1900",
  '1900' => 1910,
  '1910' => "1920",
  '1920' => '1930',
  '1930' => '1940',
  '1940' => '1950',
  '1950' => '1960',
  '1960' => '1970',
  '1970' => '1980',
  '1980' => '1990',
  '1990' => '2017'
];

$epoque = [
  'A' => array('-3500','476'),
  'MA' => array('476','1499'),
  'XVI' => array('1500','1599'),
  'XVII' => array('1600','1699'),
  'XVIII' => array('1700','1799'),
  'XIX' => array('1800','1899'),
  'XX' => array('1900','2017'),
];


if(isset($_GET['initiale'])) {
  $initial = $_GET['initiale'];
}

$queries = [
  'compositeurs' => "SELECT DISTINCT Musicien.Code_Musicien, Prénom_Musicien, Nom_Musicien
  FROM Musicien
  INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
  WHERE Musicien.Nom_Musicien LIKE :INITIAL;" ,

  'interpretes' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
  WHERE Nom_Musicien LIKE :INITIAL;" ,

  'chef_orchestre' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Direction ON Musicien.Code_Musicien = Direction.Code_Musicien
  INNER JOIN Orchestres ON Direction.Code_Orchestre = Orchestres.Code_Orchestre
  WHERE Nom_Musicien LIKE :INITIAL;" ,

  'orchestres' => "SELECT DISTINCT Code_Orchestre, Nom_Orchestre
  FROM Orchestres
  WHERE Nom_Orchestre LIKE :INITIAL;" ,

  'epoqueC' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
  WHERE Année_Naissance >= :INITIAL and Année_Naissance < :DATE_FIN ;" ,

  'epoqueI' => "SELECT DISTINCT Musicien.Code_Musicien, Nom_Musicien, Prénom_Musicien
  FROM Musicien
  INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
  WHERE Année_Naissance >= :INITIAL and Année_Naissance < :DATE_FIN ;" ,

  'instruments' => "SELECT DISTINCT Code_Instrument, Nom_Instrument
  FROM Instrument
  WHERE Nom_Instrument LIKE :INITIAL;" ,

  'genre' => "SELECT DISTINCT Code_Genre, Libellé_Abrégé
  FROM Genre
  WHERE Libellé_Abrégé LIKE :INITIAL;"
];


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
<main class="container-fluid">
  <h1 class="header text-center"><?php echo $_GET['category'];?></h1>
  <div class="page-header">
    <ul class="list-group">
      <li class="list-group-item text-center">
        <?php
        switch ($_GET['category']) {
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
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=0'>Avant 1900</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1900'>1900-1910</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1910'>1910-1920</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1920'>1920-1930</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1930'>1930-1940</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1940'>1940-1950</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1950'>1950-1960</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1960'>1960-1970</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1970'>1970-1980</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1980'>1980-1990</a>  |  ";
          echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=1990'>Après 1990</a>";
          break;

          default:
          foreach(range('A','Z') as $i) {
            echo "<a href='market.php?category=" . $_GET['category'] . "&initiale=" . $i . "'>" . $i . "</a>";
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
          <li class='list-group-item'>
            <span><a href="albums.php?code=<?php echo $row[0] ?>"><?php echo $row[1];?></a></span>
          </li>
          <?php }

          else if($_GET['category']=='instruments') { ?>
            <li class='list-group-item'>
              <img class="img-rounded" src="imageInstrument.php?Code=<?php echo $row[0]?>">
              <span> <?php echo $row[1]; ?> </span>
              <span><a href="albums.php?code=<?php echo $row[0] ?>">Voir les albums</a></span>
            </li>
            <?php }

            else if($_GET['category']=='genre') { ?>
              <li class='list-group-item'>
                <span> <?php echo $row[1]; ?> </span>
                <span><a href="albums.php?code=<?php echo $row[0] ?>">Voir les albums</a></span>
              </li>
              <?php }

              else { ?>
                <li class='list-group-item'>
                  <img class="img-rounded" src="imageMusicien.php?Code=<?php echo $row[0]?>">
                  <span> <?php echo $row[2]; ?> </span>
                  <span> <?php echo $row[1]; ?> </span>
                  <span><a href="albums.php?code=<?php echo $row[0] ?>">Voir les albums</a></span>
                </li>
                <?php }
              }

              if($empty) {
                echo "Aucun nom d'orchestres ne commence par \"" . $initial. "\".";
              }
              $dbh = null;
              ?>
            </ul>
          </div>
        </main>

        <?php include("footer.php");?>
