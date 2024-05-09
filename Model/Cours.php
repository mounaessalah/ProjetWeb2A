<?php

class Cours
{
    private $idC;
    private $Titre;
    private $Prerequis;
    private $Nombre;

    // Getter and setter for idC
    public function getIdC()
    {
        return $this->idC;
    }

    public function setIdC($idC)
    {
        $this->idC = $idC;
    }

    // Getter and setter for Titre
    public function getTitre()
    {
        return $this->Titre;
    }

    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
    }

    // Getter and setter for Prerequis
    public function getPrerequis()
    {
        return $this->Prerequis;
    }

    public function setPrerequis($Prerequis)
    {
        $this->Prerequis = $Prerequis;
    }

    // Getter and setter for Nombre
    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }
}

?>
