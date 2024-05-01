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

    public function updateEvenement($evenement, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement SET 
                    titre_evenement = :titre, 
                    duretotale_evenement = :duree, 
                    description_evenement = :description,
                    prix_evenement = :prix
                WHERE id_evenement = :id'
            );
            $query->execute([
                ':id' => $id,
                ':titre' => $evenement->getTitre_evenement(),
                ':duree' => $evenement->getDuretotale_evenement(),
                ':description' => $evenement->getDescription_evenement(),
                ':prix' => $evenement->getPrix_evenement()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error updating Evenement: ' . $e->getMessage(); // Ajout du message d'erreur
        }
    }

    public function showevenement($id)
    {
        $sql = "SELECT * from evenement where id_evenement = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $evenement = $query->fetch();
            return $evenement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
