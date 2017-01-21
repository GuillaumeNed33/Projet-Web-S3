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
    public $_ASIN;
    public $_quantite = 1;

    public function __construct($id, $titre, $annee, $ASIN, $prix) {
        $this->_id($id);
        $this->_titre($titre);
        $this->_annee($annee);
        $this->_ASIN($ASIN);
        $this->_prix($prix);
    }

    public function addQte() {
        $this->_quantite = $this->_quantite + 1;
    }

    public function DeleteQte() {
      if($this->_quantite < 1)
          $this->_quantite = $this->_quantite - 1;
    }

    public function existProduit($arrayName) {
      $exist = false;
      foreach($arrayName as $element)
      {
        if($element._id == $this->_id) {
          $exist = true;
        }
      }
      return $exist;
    }

    public function setQte($nb)
    {
        $this->_quantite = $this->_quantite + $nb;
    }

    public function getIndex($arrayName)
    {
      $i = 0;
      $index = -1;
      foreach($arrayName as $element)
      {
        if($element._id == $this->_id) {
          $index = $i;
        }
        $i++;
      }
      return $index;
    }
}
