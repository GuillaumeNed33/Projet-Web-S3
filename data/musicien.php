<?php
/**
 *
 */
class Musicien
{
    public $_id;
    public $_nom;
    public $_prenom;

    public function __construct($id, $nom, $prenom) // Constructeur demandant 2 paramètres
    {
        $this->_id($id);
        $this->_nom($nom);
        $this->_prenom($prenom);
    }
}
?>
