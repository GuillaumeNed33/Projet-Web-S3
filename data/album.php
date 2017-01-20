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
    public $_quantite = 0;

    public function __construct($id, $titre, $annee, $pochette, $ASIN, $prix) {
        $this->_id($id);
        $this->_titre($titre);
        $this->_annee($annee);
        $this->_pochette($pochette);
        $this->_ASIN($ASIN);
        $this->_prix($prix);
    }

    public function addQte() {
      $_quantite++;
    }

    public function DeleteQte() {
      if($_quantite < 1)
      $_quantite--;
    }

    public function existProduit($arrayName) {
      $exist = false;
      foreach($element as $arrayName)
      {
        if($element.$_id == $_id) {
          $exist = true;
        }
      }
      return $exist;
    }

    public function getIndex()
    {
      $i = 0;
      $index = -1;
      foreach($element as $arrayName)
      {
        if($element.$_id == $_id) {
          $index = $i;
        }
        $i++;
      }
      return $index;
    }
}
