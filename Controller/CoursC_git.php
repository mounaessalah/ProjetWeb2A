<?php

require_once 'C:\xampp\htdocs\MindFullPaths\config.php';

class CoursC
{
    function listCourses() 
    {
        $sql = "SELECT c.*, r.ressource AS ressource_name FROM cours c LEFT JOIN ressources r ON c.iDRessource = r.idRessource";
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
    
    function searchCourse($searchTerm)
    {
        $sql = "SELECT * FROM cours WHERE Titre LIKE :searchTerm OR Prerequis LIKE :searchTerm";
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

    function countCourses()
    {
        $sql = "SELECT count(idC) FROM cours";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $courseCount = $query->fetchColumn();
            return $courseCount;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function getCourseById($idC)
    {
        $sql = "SELECT * FROM cours WHERE idC=:idC";
        $config = config::getConnexion();
        try {
            $query = $config->prepare($sql);
            $query->execute(['idC' => $idC]);
            $result = $query->fetch();
            return $result;
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }
    function addCourse($course)
    {
        $config = config::getConnexion();
        try {
            // Prepare the SQL query with placeholders
            $query = $config->prepare('INSERT INTO cours (Titre, Prerequis, Nombre, Image, Hours, Niveau) VALUES (:Titre, :Prerequis, :Nombre, :Image, :Hours, :Niveau)');
            
            // Bind values to the placeholders
            $query->bindValue(':Titre', $course->getTitre());
            $query->bindValue(':Prerequis', $course->getPrerequis());
            $query->bindValue(':Nombre', $course->getNombre());
            $query->bindValue(':Image', $course->getImage());
            $query->bindValue(':Hours', $course->getHours());
            $query->bindValue(':Niveau', $course->getNiveau());
            
            // Execute the query
            $query->execute();
            
            // Set the ID of the inserted row in the course object
            $course->setIdC($config->lastInsertId());
            
            // Return true to indicate success
            return true;
        } catch (PDOException $th) {
            // If an exception occurs, return the error message
            return $th->getMessage();
        }
    }

    
    function modifyCourse($course)
    {
        $config = config::getConnexion();
        try {
            $query = $config->prepare('UPDATE cours SET Titre=:Titre, Prerequis=:Prerequis, Nombre=:Nombre, Image=:Image, Hours=:Hours, Niveau=:Niveau WHERE idC=:idC');
            $query->execute([
                'idC' => $course->getIdC(),
                'Titre' => $course->getTitre(),
                'Prerequis' => $course->getPrerequis(),
                'Nombre' => $course->getNombre(),
                'Image' => $course->getImage(),
                'Hours' => $course->getHours(),
                'Niveau' => $course->getNiveau()
            ]);
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    function deleteCourse($idC)
    {
        $sql = "DELETE FROM cours WHERE idC= :idC";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idC', $idC);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
