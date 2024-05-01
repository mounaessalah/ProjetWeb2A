<?php
include '../config.php';
include '../Model/evenement.php';

class EvenementC
{

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
        VALUES (:id_evenement, :titre_evenement, :duretotale_evenement, :description_evenement, :prix_evenement, :idCategorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                ':id_evenement' => $evenement->getId_evenement(),
                ':titre_evenement' => $evenement->getTitre_evenement(),
                ':duretotale_evenement' => $evenement->getDuretotale_evenement(),
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
                    e.duretotale_evenement = :duretotale_evenement,
                    e.description_evenement = :description_evenement,
                    e.prix_evenement = :prix_evenement,
                    e.idCategorie = :idCategorie
                WHERE e.id_evenement = :id'
            );
    
            $query->execute([
                ':id' => $id,
                ':titre_evenement' => $evenement->getTitre_evenement(),
                ':duretotale_evenement' => $evenement->getDuretotale_evenement(),
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
                $evenement->duretotale_evenement,
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
