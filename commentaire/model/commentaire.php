<?php
class commentaire
{
    private $ID_commentaire;
    private $Auteur;
    private $Contenu;
    private $Date_création;
   

    public function __construct($ID_commentaire, $Auteur, $Contenu, $Date_création)
    {
        $this->ID_commentaire = $ID_commentaire;
        $this->Auteur = $Auteur;
        $this->Contenu = $Contenu;
        $this->Date_création = $Date_création;
      
    }

    public function getID_commentaire()
    {
        return $this->ID_commentaire;
    }

    public function getAuteur()
    {
        return $this->Auteur;
    }

    public function setAuteur($Auteur)
    {
        $this->Auteur = $Auteur;
    }

    public function getContenu()
    {
        return $this->Contenu;
    }

    public function setContenu($Contenu)
    {
        $this->Contenu = $Contenu;
    }

    public function getDate_création()
    {
        return $this->Date_création;
    }

    public function setDate_création($Date_création)
    {
        $this->Date_création = $Date_création;
    }

   
}
?>
