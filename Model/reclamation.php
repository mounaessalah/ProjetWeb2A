<?php
//de preference def classe , constructeur et setter et getter seulement ici 
class reclamation
{
   
    private ?int $id_reclamation = null;
    private ?string $titre_reclamation = null;
    private ?string $date_reclamation = null;
    private ?string $type_reclamation = null;
    private ?string $description_reclamation = null;
    
   
    
    public function __construct($id_reclamation = null, $titre_reclamation, $date_reclamation, $type_reclamation, $description_reclamation)
    {
        $this->id_reclamation = $id_reclamation;
        $this->titre_reclamation = $titre_reclamation;
        $this->date_reclamation = $date_reclamation;
        $this->type_reclamation = $type_reclamation;
        $this->description_reclamation = $description_reclamation;
        
    }
   

    /**
     * Get the value of id_reclation
     */
    public function getId_reclamation()
    {
        return $this->id_reclamation;
    }

    /**
     * Get the value of titre_reclation
     */
    public function getTitre_reclamation()
    {
        return $this->titre_reclamation;
    }

    /**
     * Set the value of titre_reclamation
     *
     * @return  self
     */
    public function settitre_reclamation($titre_reclamation)
    {
        $this->titre_reclamation = $titre_reclamation;

        return $this;
    }

    /**
     * Get the value of date_reclamation
     */
    public function getdate_reclamation()
    {
        return $this->date_reclamation;
    }

    /**
     * Set the value of ddate_reclamation
     *
     * @return  self
     */
    public function setdate_reclamation($date_reclamation)
    {
        $this->date_reclamation = $date_reclamation;

        return $this;
    }

    /**
     * Get the value of type_reclamation
     */
    public function gettype_reclamation()
    {
        return $this->type_reclamation;
    }

    /**
     * Set the value of description_reclamation
     *
     * @return  self
     */
    public function settype_reclamation($type_reclamation)
    {
        $this->type_reclamation = $type_reclamation;

        return $this;
    }

    /**
     * Get the value of description_reclamtion
     */
    public function getdescription_reclamation()
    {
        return $this->description_reclamation;
    }

    /**
     * Set the value of description_reclamation
     *
     * @return  self
     */
    public function setdescription_reclamation($description_reclamation)
    {
        $this->description_reclamation = $description_reclamation;

        return $this;
    }

}