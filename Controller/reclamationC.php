<?php
include '../config.php';
include '../Model/reclamation.php';

class reclamationC
{
    public function listreclamations()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deletereclamation($id)
    {
        $sql = "DELETE FROM reclamation WHERE id_reclamation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function addreclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL, :titre_reclamation, :date_reclamation, :type_reclamation, :description_reclamation)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre_reclamation' => $reclamation->getTitre_reclamation(),
                'date_reclamation' => $reclamation->getdate_reclamation(),
                'type_reclamation' => $reclamation->gettype_reclamation(),
                'description_reclamation' => $reclamation->getdescription_reclamation()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updatereclamation($reclamation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    titre_reclamation = :titre, 
                    date_reclamation = :date, 
                    type_reclamation = :type,
                    description_reclamation = :description
                    
                WHERE id_reclamation = :id'
            );
            $query->execute([
                'id' => $id,
                'titre' => $reclamation->getTitre_reclamation(),
                'date' => $reclamation->getdate_reclamation(),
                'type' => $reclamation->gettype_reclamation(),
                'description' => $reclamation->getdescription_reclamation(),
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function showreclamation($id)
    {
        $sql = "SELECT * from reclamation where id_reclamation = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
