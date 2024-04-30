<?php
// categorie.php

class Categorie {
    private $idCategorie;
    private $nom;

    // Constructeur
    public function __construct($idCategorie, $nom) {
        $this->idCategorie = $idCategorie;
        $this->nom = $nom;
    }

    // Getter et Setter pour idCategorie
    public function getIdCategorie() {
        return $this->idCategorie;
    }

    public function setIdCategorie($idCategorie) {
        $this->idCategorie = $idCategorie;
    }

    // Getter et Setter pour nom
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
}

?>
