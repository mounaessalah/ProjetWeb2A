<?php
// Inclure votre fichier de connexion à la base de données
include 'config.php';

// Requête pour récupérer les événements depuis la base de données
$sql = "SELECT id_evenement, titre_evenement, date_debut, heure_debut, date_fin, heure_fin FROM evenement";
$result = mysqli_query($conn, $sql);

// Créer un tableau pour stocker les événements
$events = array();

// Parcourir les résultats de la requête et ajouter les événements au tableau
while ($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
}

// Convertir le tableau en format JSON et le renvoyer
echo json_encode($events);
?>
