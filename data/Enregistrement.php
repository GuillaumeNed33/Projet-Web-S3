<?php

/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 22/01/2017
 * Time: 23:19
 */
class Enregistrement
{
    private $_id;
    private $_titre;
    private $_duree;
    private $_prix;

    public function __construct($id, $titre, $duree, $prix) {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setDuree($duree);
        $this->setPrix($prix);
    }
    /* MUTATEURS*/
    public function setId($val) {
        $this->_id = $val;
    }
    public function setTitre($val) {
        $this->_titre = $val;
    }
    public function setDuree($val) {
        $this->_duree = $val;
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
    public function getDuree() {
        return $this->_duree;
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
