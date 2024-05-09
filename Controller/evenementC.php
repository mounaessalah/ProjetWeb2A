<?php
include '../config.php';
include '../Model/evenement.php';

class EvenementC

{  
    
    
    public function get_event_details_by_id($evenement_id) {
    $sql = "SELECT * FROM evenement WHERE id_evenement = :id_evenement";
    $db = config::getConnexion(); // Assurez-vous d'avoir une connexion à la base de données
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_evenement', $evenement_id, PDO::PARAM_INT);
        $stmt->execute();
        $evenement_details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $evenement_details;
    } catch (PDOException $e) {
        // En cas d'erreur de requête
        die('Erreur de base de données: ' . $e->getMessage());
    }
}
    public function getEvenementsForCalendarByMonth($currentMonth, $currentYear)
{
    // Requête SQL pour sélectionner les événements du mois et de l'année spécifiés
    $sql = "SELECT titre_evenement, date_debut, heure_debut, heure_fin FROM evenement WHERE MONTH(date_debut) = :month AND YEAR(date_debut) = :year";
    $db = config::getConnexion();
    
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':month', $currentMonth, PDO::PARAM_INT);
        $stmt->bindParam(':year', $currentYear, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        die('Erreur de base de données: ' . $e->getMessage());
    }
}
    public function getEvenementsForCalendar()
    {
        $sql = "SELECT titre_evenement, date_debut, heure_debut, date_fin,  heure_fin FROM evenement";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die('Erreur de base de données: ' . $e->getMessage());
        }
    }
    
    public function getStatistics()
    {
        $sql = "SELECT c.nom as cat_name, COUNT(e.id_evenement) as evenement_count
        FROM categorie c
        LEFT JOIN evenement e ON c.idCategorie = e.idCategorie 
        GROUP BY c.idCategorie";
    
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception('Error getting statistics: ' . $e->getMessage());
        }
    }
    
    
    public function rechercherEvenements($recherche)
{
    $sql = "SELECT * FROM evenement WHERE titre_evenement LIKE :recherche OR description_evenement LIKE :recherche";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':recherche', '%' . $recherche . '%', PDO::PARAM_STR);
        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    } catch (PDOException $e) {
        die('Erreur de base de données: ' . $e->getMessage());
    }
}
    
    public function listevenementsTriCategorie()
    {
        $sql = "SELECT * FROM evenement ORDER BY idCategorie";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die('Erreur de base de données: ' . $e->getMessage());
        }
    }
    // Méthode pour trier les événements par titre
    public function listevenementsTriTitre()
    {
        $sql = "SELECT * FROM evenement ORDER BY titre_evenement ASC"; // ASC pour trier par ordre croissant
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die('Erreur de base de données: ' . $e->getMessage());
        }
    }

// Méthode pour trier les événements par date
public function listevenementsTriDate()
{
    $sql = "SELECT * FROM evenement ORDER BY date_debut";
    $db = config::getConnexion();
    try {
        $stmt = $db->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        die('Erreur de base de données: ' . $e->getMessage());
    }
}



    public function listEvenements()
    {
        $sql = "SELECT * FROM evenement";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteEvenement($id)
    {
        $sql = "DELETE FROM evenement WHERE id_evenement = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addEvenement($evenement)
    {
        $sql = "INSERT INTO evenement  
        VALUES (:id_evenement, :titre_evenement, :date_debut, :heure_debut, :heure_fin, :date_fin, :description_evenement, :prix_evenement, NOW(), :idCategorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                ':id_evenement' => $evenement->getId_evenement(),
                ':titre_evenement' => $evenement->getTitre_evenement(),
                'date_debut'=> $evenement->getDate_debut(),
                ':heure_debut' => $evenement->getHeure_debut(),
                ':heure_fin' => $evenement->getheure_fin(),
                ':date_fin'=> $evenement->getDate_fin(),
                ':description_evenement' => $evenement->getDescription_evenement(),
                ':prix_evenement' => $evenement->getPrix_evenement(),
                ':idCategorie' => $evenement->getIdCategorie()
            ]); 
        } catch (Exception $e) {
            echo 'Error adding Evenement: ' . $e->getMessage(); // Ajout du message d'erreur
        }
    }
    function updateEvenement($evenement, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement e
                INNER JOIN categorie c ON e.idCategorie = c.idCategorie
                SET 
                    e.titre_evenement = :titre_evenement, 
                    e.date_debut = :date_debut, 
                    e.heure_debut = :heure_debut, 
                    e.heure_fin = :heure_fin,
                    e.date_fin = :date_fin, 
                    e.description_evenement = :description_evenement,
                    e.prix_evenement = :prix_evenement,
                    e.idCategorie = :idCategorie
                WHERE e.id_evenement = :id'
            );
    
            $query->execute([
                ':id' => $id,
                ':titre_evenement' => $evenement->getTitre_evenement(),
                ':date_debut' => $evenement->getDate_debut(),
                ':heure_debut' => $evenement->getHeure_debut(),
                ':heure_fin' => $evenement->getheure_fin(),
                ':date_fin' => $evenement->getDate_fin(),
                ':description_evenement' => $evenement->getDescription_evenement(),
                ':prix_evenement' => $evenement->getPrix_evenement(),
                ':idCategorie' => $evenement->getIdCategorie()
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
  
    public function showevenement($id)
{
    $sql = "SELECT * from evenement where id_evenement = $id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();

        // Fetch l'événement en tant qu'objet
        $evenement = $query->fetch(PDO::FETCH_OBJ);
        
        // Si un événement est trouvé, retournez-le, sinon retournez null
        if ($evenement) {
            return new evenement(
                $evenement->id_evenement,
                $evenement->titre_evenement,
                $evenement->date_debut,
                $evenement->heure_debut,
                $evenement->heure_fin,
                $evenement->date_fin,
                $evenement->description_evenement,
                $evenement->idCategorie,
                $evenement->prix_evenement
            );
        } else {
            return null;
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    
public function getIdCategorie()
    {
        // Logique pour récupérer les données des catégories depuis la base de données
        $sql = "SELECT idCategorie, nom FROM categorie";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

public function triEvenementsParDate()
{
    $sql = "SELECT * FROM evenement ORDER BY date_debut";
    $db = config::getConnexion();
    try {
        $stmt = $db->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        die('Erreur de base de données: ' . $e->getMessage());
    }
}
}