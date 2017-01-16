<?php
$initial = "";
if(isset($_GET['initiale'])) {
    $initial = $_GET['initiale'];
}

$queries = [
    "compositeurs" => "SELECT DISTINCT(Nom_Musicien) 
                      FROM Musicien INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien 
                      WHERE Nom_Musicien LIKE N'".$initial."';" ,
    "interpretes" => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    "epoque" => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    "chef_orchestre" => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    "orchestres" => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    "instrument" => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    "compositeurs" => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
    "genre" => "SELECT Nom_Musicien FROM Musicien WHERE Nom_Musicien LIKE N'".$initial."';" ,
];



if(isset($queries[$_GET['category']])) {
    //TO DO,
} else {
    header('Location: error.php');
}

include("header.php"); ?>
    <main class="container">
        <div class="page-header">

        </div>
    </main>
<?php include("footer.php"); ?>