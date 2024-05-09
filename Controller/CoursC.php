<?php

require_once 'C:\xampp\htdocs\MindFullPaths\config.php';

class CoursC
{

    function listCourses() 
    {
        $sql = "SELECT * FROM cours";
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
            $query = $config->prepare('INSERT INTO cours (Titre, Prerequis, Nombre) VALUES (:Titre, :Prerequis, :Nombre)');
            $query->execute([
                'Titre' => $course->getTitre(),
                'Prerequis' => $course->getPrerequis(),
                'Nombre' => $course->getNombre()
            ]);
            $course->setIdC($config->lastInsertId());
        } catch (PDOException $th) {
            return $th->getMessage();
        }
    }

    function modifyCourse($course)
    {
        $config = config::getConnexion();
        try {
            $query = $config->prepare('UPDATE cours SET Titre=:Titre, Prerequis=:Prerequis, Nombre=:Nombre WHERE idC=:idC');
            $query->execute([
                'idC' => $course->getIdC(),
                'Titre' => $course->getTitre(),
                'Prerequis' => $course->getPrerequis(),
                'Nombre' => $course->getNombre()
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
