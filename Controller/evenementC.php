<?php
include '../config.php';
include '../Model/evenement.php';

class EvenementC
{
    // Méthode pour trier les événements par titre
public function triParTitre()
{
    $sql = "SELECT * FROM evenement ORDER BY titre_evenement";
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
public function triParDate()
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
}
