<?php

require_once 'C:\xampp\htdocs\MindFullPaths\config.php';

class RessourcesC
{

    function listRessources() 
    {
        $sql = "SELECT * FROM ressources";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $res = $query->fetchAll();
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
   
    function searchRessource($searchTerm)
    {
        $sql = "SELECT * FROM ressources WHERE some_column LIKE :searchTerm";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':searchTerm', '%' . $searchTerm . '%');
            $query->execute();
            $res = $query->fetchAll();
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function countRessources()
    {
        $sql = "SELECT count(idRessource) FROM ressources";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $ressourceCount = $query->fetchColumn();
            return $ressourceCount;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function getRessourceById($idRessource)
    {
        $sql = "SELECT * FROM ressources WHERE idRessource=:idRessource";
        $config = config::getConnexion();
        try {
            $query = $config->prepare($sql);
            $query->execute(['idRessource' => $idRessource]);
            $result = $query->fetch();
            return $result;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }
    function addRessource($ressource)
    {
        $config = config::getConnexion();
        try {
            $query = $config->prepare('INSERT INTO ressources (ressource) VALUES (:ressource)');
            $query->execute([
                'ressource' => $ressource->getRessource()
            ]);
            $ressource->setIdRessource($config->lastInsertId());
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }
    


    function deleteRessource($idRessource)
    {
        $sql = "DELETE FROM ressources WHERE idRessource= :idRessource";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idRessource', $idRessource);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
