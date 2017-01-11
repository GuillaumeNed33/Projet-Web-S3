<?php
switch($_GET['category']) {
    case 'compositeurs':
        include("header.php"); ?>
        <main class="container">
            <div class="page-header">
                <h1>Compositeurs</h1>
            </div>
        </main>
        <?php break;
    case 'interpretes':
        include("header.php"); ?>
        <main class="container">
            <div class="page-header">
                <h1>Interprètes</h1>
            </div>
        </main>
        <?php break;
    case 'epoque':
        include("header.php");?>
        <main class="container">
            <div class="page-header">
                <h1>Epoque</h1>
            </div>
        </main>
        <?php break;
    case 'chefs_orchestre':
        include("header.php");?>
        <main class="container">
            <div class="page-header">
                <h1>Chefs d'orchestre</h1>
            </div>
        </main>
        <?php break;
    case 'orchestres':
        include("header.php");?>
        <main class="container">
            <div class="page-header">
                <h1>Orchestres</h1>
            </div>
        </main>
        <?php break;
    case 'instruments':
        include("header.php");?>
        <main class="container">
            <div class="page-header">
                <h1>Instruments</h1>
            </div>
        </main>
        <?php break;
    case 'genre':
        include("header.php");?>
        <main class="container">
            <div class="page-header">
                <h1>Genre</h1>
            </div>
        </main>
        <?php break;
    default:
        header('Location: error.php');
}
?>

    <!-- <h4>LA BOUTIQUE DES BG</h4>
        <form method="post" action=<?php/*$_SERVER['PHP_SELF']*/?>>
            <select name="alphabet">
                <option value="" disabled="true" selected="true">Choisir une lettre</option>
                <?php/*
                for($alpha = 65; $alpha != 91; $alpha++) {
                    echo '<option value="' . chr($alpha) . '">' . chr($alpha) . '</option>';
                }
                */?>
            </select>
            <button class="btn btn-primary btn-lg" type="submit" name="action">Envoyer</button>
        </form> -->

<?php include("footer.php"); ?>