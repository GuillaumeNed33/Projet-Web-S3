<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 23/12/2016
 * Time: 18:35
 */
include "header.php"; ?>

    <form method="post" action=<?=$_SERVER['PHP_SELF']?>>
        <select name="alphabet">
                <option value="" disabled="true" selected="true">Choisir une lettre</option>
                <?php
                for($alpha = 65; $alpha != 91; $alpha++) {
                    echo '<option value="' . chr($alpha) . '">' . chr($alpha) . '</option>';
                }
                ?>
            </select>
        <button class="btn btn-primary btn-lg" type="submit" name="action">Envoyer</button>
    </form>

<?php include "footer.php"; ?>