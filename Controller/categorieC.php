<?php

require_once '../config.php';
include '../Model/categorie.php';
class CategorieC
{ 

    public function listCategorieee()
    {
        $sql = "SELECT * FROM categorie ORDER BY idCategorie DESC";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listCategories()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            throw new Exception('Error fetching Categories: ' . $e->getMessage());
        }
    }

    public function addCategorie($Categorie)
    {
        $sql = "INSERT INTO categorie (nom) VALUES (:nom)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $Categorie->getNom(),
            ]);
        } catch (Exception $e) {
            throw new Exception('Error adding Categorie: ' . $e->getMessage());
        }
    }

    public function showCategorie($idCategorie)
    {
        $sql = "SELECT * FROM categorie WHERE idCategorie = :idCategorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idCategorie' => $idCategorie]);
            $Categorie = $query->fetch();
            return $Categorie;
        } catch (Exception $e) {
            throw new Exception('Error fetching Categorie: ' . $e->getMessage());
        }
    }

   

   
    
    public function updatecategorie($categorie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    nom = :nom
                WHERE idCategorie = :id'
            );
            $query->execute([
                'id' => $id,
                'nom' => $categorie->getNom(),
            ]);
            
            // Vérifiez si la mise à jour a été effectuée avec succès
            if ($query->rowCount() > 0) {
                echo "La catégorie a été mise à jour avec succès.";
            } else {
                echo "Aucun enregistrement n'a été modifié.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la catégorie : " . $e->getMessage();
        }
    }
    

    public function deleteCategorie($idCategorie)
    {
        $sql = "DELETE FROM categorie WHERE idCategorie = :idCategorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idCategorie', $idCategorie);

        try {
            $req->execute();
        } catch (Exception $e) {
            throw new Exception('Error deleting Categorie: ' . $e->getMessage());
        }
    }
    
    public function searchCategorie($searchQuery)
    {
        $sql = "SELECT * FROM categorie WHERE nom LIKE :searchQuery";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['searchQuery' => "%$searchQuery%"]); 
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception('Error searching Categorie: ' . $e->getMessage());
        }
    }
    public function getCategorieNameById($id)
    {
        try {
            $Categorie = $this->showCategorie($id);
            
            if ($Categorie) {
                return $Categorie['nom']; 
            } else {
                return 'Unknown Categorie';
            }
        } catch (Exception $e) {
            throw new Exception('Error getting Categorie name: ' . $e->getMessage());
        }
    }
}