<?php
// Inclure la classe EvenementC
include '../Controller/evenementC.php';

// Vérifier si l'ID de l'événement est passé en paramètre
if(isset($_GET['id'])) {
    // Récupérer l'ID de l'événement depuis les paramètres
    $evenement_id = $_GET['id'];
    
    // Créer une instance de la classe EvenementC
    $evenementC = new EvenementC();
    
    // Récupérer les détails de l'événement depuis la base de données en utilisant l'ID
    $evenement_details = $evenementC->get_event_details_by_id($evenement_id);
    
    // Vérifier si l'événement existe
    if($evenement_details) {
        // Script de génération de PDF
        // Inclure la bibliothèque PDF
        require_once('../tcpdf/tcpdf.php');

        // Créer une nouvelle instance de la classe TCPDF
        $pdf = new TCPDF();

        // Ajouter une page au PDF
        $pdf->AddPage();

        // Définir la police par défaut pour le contenu du PDF
        $pdf->SetFont('helvetica', '', 12);

        // Couleur du texte
        $pdf->SetTextColor(0, 0, 0); // Noir

        // Titre de l'événement
        $pdf->Cell(0, 10, 'Titre de l\'événement: ' . $evenement_details['titre_evenement'], 0, 1);

        // Date de début
        $pdf->Cell(0, 10, 'Date de début: ' . $evenement_details['date_debut'], 0, 1);

        // Heure de début
        $pdf->Cell(0, 10, 'Heure de début: ' . $evenement_details['heure_debut'], 0, 1);

        // Heure de fin
        $pdf->Cell(0, 10, 'Heure de fin: ' . $evenement_details['heure_fin'], 0, 1);

        // Date de fin
        $pdf->Cell(0, 10, 'Date de fin: ' . $evenement_details['date_fin'], 0, 1);

        // Description de l'événement
        $pdf->SetFont('helvetica', 'I', 12); // Italique
        $pdf->MultiCell(0, 10, 'Description: ' . $evenement_details['description_evenement'], 0, 'L');

        // Sortie du PDF
        $pdf->Output('evenement_details.pdf', 'D');

    } else {
        // Afficher un message d'erreur si l'événement n'existe pas
        echo '<p>L\'événement demandé n\'existe pas.</p>';
    }
} else {
    // Afficher un message d'erreur si l'ID de l'événement n'est pas passé en paramètre
    echo '<p>Aucun identifiant d\'événement n\'a été spécifié.</p>';
}
?>
