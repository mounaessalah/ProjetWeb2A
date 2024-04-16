<?php
include_once 'C:/wamp64/www/commentaire/config.php';
include_once "c:/wamp64/www/commentaire/model/commentaire.php";

class commentaireC
{

    public function listCommentaire()
    {
        $sql = "SELECT * FROM commentaire"; // Modification de la requête SQL
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommentaire($ID_commentaire)
    {
        $sql = "DELETE FROM commentaire WHERE ID_commentaire = :ID_commentaire"; // Modification de la requête SQL
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':ID_commentaire', $ID_commentaire);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCommentaire(commentaire $commentaire) {
        $sql = "INSERT INTO commentaire (ID_commentaire,Auteur, Contenu, Date_création) 
                VALUES (:ID_commentaire, :Auteur, :Contenu, :Date_création)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $result = $query->execute([
                'ID_commentaire' => $commentaire->getID_commentaire(),
                'Auteur' => $commentaire->getAuteur(),
                'Contenu' => $commentaire->getContenu(),
                'Date_création' => $commentaire->getDate_création()->format('Y-m-d H:i:s')
                
            ]);
             if ($result) {
                echo "<script type=\"text/javascript\"> 
                        alert('Ajout avec succès!'); 
                        window.location.href = 'http://localhost/commentaire/view/listCommentaire.php';
                      </script>";
                exit(); // Make sure to end the script execution after the redirection
            } else {
                echo "<script type=\"text/javascript\"> 
                        alert('Erreur lors de l\'enregistrement'); 
                      </script>";
            }
            
          
            // Gestion des résultats et des messages d'alerte
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    function showCommentaire($ID_commentaire)
    {
        $sql = "SELECT * FROM commentaire WHERE ID_commentaire = $ID_commentaire"; // Modification de la requête SQL
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCommentaire(commentaire $commentaire, $ID_commentaire) // Modification du paramètre pour utiliser le modèle Forum
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE commentaire SET 
                    Auteur = :Auteur, 
                    Contenu = :Contenu, 
                    Date_création = :Date_création 
                   
                WHERE ID_commentaire = :ID_commentaire"
            );
            
            $result = $query->execute([
                'ID_commentaire' => $ID_commentaire,
                'Auteur' => $commentaire->getAuteur(),
                'Contenu' => $commentaire->getContenu(),
                'Date_création' => $commentaire->getDate_création()->format('Y-m-d H:i:s')
                
            ]);
            if ($result) {
                echo "<script type=\"text/javascript\"> 
                        alert('Mise à jour avec succès!'); 
                        window.location.href = 'http://localhost/commentaire/view/listCommentaire.php';
                      </script>";
                exit(); // Assurez-vous de mettre fin à l'exécution du script après la redirection
            } else {
                echo "<script type=\"text/javascript\"> 
                        alert('Erreur lors de la mise à jour de l\\'enregistrement'); 
                      </script>";
            }
            // Gestion des résultats et des messages d'alerte
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
