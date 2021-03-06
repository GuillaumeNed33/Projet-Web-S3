<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/01/2017
 * Time: 21:45
 */

class Album {
    private $_id;
    private $_titre;
    private $_annee;
    private $_prix;
    private $_ASIN;

    public function __construct($id, $titre, $annee, $ASIN, $prix) {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setAnnee($annee);
        $this->setASIN($ASIN);
        $this->setPrix($prix);
    }
    /* MUTATEURS*/
    public function setId($val) {
        $this->_id = $val;
    }
    public function setTitre($val) {
        $this->_titre = $val;
    }
    public function setAnnee($val) {
        $this->_annee = $val;
    }
    public function setASIN($val) {
        $this->_ASIN = $val;
    }
    public function setPrix($val) {
        $this->_prix = $val;
    }

    /*ACCESSEURS*/
    public function getId() {
        return $this->_id;
    }
    public function getTitre() {
        return $this->_titre;
    }
    public function getAnnee() {
        return $this->_annee;
    }
    public function getASIN() {
        return $this->_ASIN;
    }
    public function getPrix() {
        return $this->_prix;
    }

    public function exist($array) {
        foreach ($array as $element)
        {
            if($element->getId() == $this->getId())
            {
                return true;
            }
        }
        return false;
    }
}
