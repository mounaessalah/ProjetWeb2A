<?php

class Cours
{
    private $idC;
    private $Titre;
    private $Prerequis;
    private $Nombre;
    private $Image;
    private $Hours;
    private $Niveau;

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

    // Getter and setter for Image
    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;
    }

    // Getter and setter for Hours
    public function getHours()
    {
        return $this->Hours;
    }

    public function setHours($Hours)
    {
        $this->Hours = $Hours;
    }

    // Getter and setter for Niveau
    public function getNiveau()
    {
        return $this->Niveau;
    }

    public function setNiveau($Niveau)
    {
        $this->Niveau = $Niveau;
    }
}

?>
