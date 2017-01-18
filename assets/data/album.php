<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/01/2017
 * Time: 21:45
 */

class Album {
    public $_id;
    public $_titre;
    public $_annee;
    public $_prix;
    public $_pochette;
    public $_ASIN;

    public function __construct($id, $titre, $annee, $pochette, $ASIN, $prix) {
        $this->_id($id);
        $this->_titre($titre);
        $this->_annee($annee);
        $this->_pochette($pochette);
        $this->_ASIN($ASIN);
        $this->_prix($prix);
    }
}