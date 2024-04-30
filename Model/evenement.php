<?php
//de preference def classe , constructeur et setter et getter seulement ici 
class evenement
{
    private ?int $id_evenement;
    private ?string $titre_evenement = null;
    private ?string $duretotale_evenement = null;
    private ?string $description_evenement = null;
    private ?float $prix_evenement = null;
    private ?int $idCategorie ;


  
    public function __construct($id_evenement, $titre_evenement, $duretotale_evenement, $description_evenement, $prix_evenement, $idCategorie)
{
    $this->id_evenement = $id_evenement;
    $this->titre_evenement = $titre_evenement;
    $this->duretotale_evenement = $duretotale_evenement;
    $this->description_evenement = $description_evenement;
    $this->prix_evenement = $prix_evenement;
    $this->idCategorie = $idCategorie; 
}

    /**
     * Get the value of id_evenement
     */
    public function getId_evenement()
    {
        return $this->id_evenement;
    }

    /**
     * Get the value of titre_evenement
     */
    public function getTitre_evenement()
    {
        return $this->titre_evenement;
    }

    /**
     * Set the value of titre_evenement
     *
     * @return  self
     */
    public function setTitre_evenement($titre_evenement)
    {
        $this->titre_evenement = $titre_evenement;

        return $this;
    }

    /**
     * Get the value of duretotale_evenement
     */
    public function getDuretotale_evenement()
    {
        return $this->duretotale_evenement;
    }

    /**
     * Set the value of duretotale_evenement
     *
     * @return  self
     */
    public function setDuretotale_evenement($duretotale_evenement)
    {
        $this->duretotale_evenement = $duretotale_evenement;

        return $this;
    }

    /**
     * Get the value of description_evenement
     */
    public function getDescription_evenement()
    {
        return $this->description_evenement;
    }

    /**
     * Set the value of description_evenement
     *
     * @return  self
     */
    public function setDescription_evenement($description_evenement)
    {
        $this->description_evenement = $description_evenement;

        return $this;
    }

   

    /**
     * Get the value of prix_evenement
     */
    public function getPrix_evenement()
    {
        return $this->prix_evenement;
    }

    /**
     * Set the value of prix_evenement
     *
     * @return  self
     */
    public function setPrix_evenement($prix_evenement)
    {
        $this->prix_evenement = $prix_evenement;

        return $this;
    }


        /**
         * Get the value of idCategorie
         */ 
        public function getIdCategorie()
        {
                return $this->idCategorie;
        }

        /**
         * Set the value of idCategorie
         *
         * @return  self
         */ 
        public function setIdCategorie($idCategorie)
        {
                $this->idCategorie = $idCategorie;

                return $this;
        }
}
