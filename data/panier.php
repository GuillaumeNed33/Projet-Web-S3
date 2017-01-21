<?php
require_once "album.php";

function ajouterProduit(Album $alb) {

    if ($alb.existProduit($_SESSION['panier'])) {
        $_SESSION['panier'][$alb->getIndex()]->addQte();
    }
    else  {
        array_push( $_SESSION['panier'],$alb);
    }
}

function supprProduit(Album $alb) {

    if ($alb->_quantite > 1) {
        $_SESSION['panier'][$alb->getIndex()]->DeleteQte();
    }
    else  {
        unset($_SESSION['panier'][$alb->getIndex()]);
    }
}
?>
