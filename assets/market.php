<?php
include("header.php");

switch($_GET['category']) {
    case 'compositeurs': ?>
        <div class="page-header">
            <h1>Compositeurs</h1>
        </div>
        <?php break;
    case 'interpretes': ?>
        <div class="page-header">
            <h1>Compositeurs</h1>
        </div>
        <?php break;
    case 'epoque': ?>
        <div class="page-header">
            <h1>Compositeurs</h1>
        </div>
        <?php break;
    case 'chefs_orchestre': ?>
        <div class="page-header">
            <h1>Compositeurs</h1>
        </div>
        <?php break;
    case 'orchestres': ?>
        <div class="page-header">
            <h1>Compositeurs</h1>
        </div>
        <?php break;
    default:
        header("data/error.php");
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

        <?php include "footer.php"; ?>