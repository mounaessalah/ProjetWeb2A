<?php
include '../Controller/reclamationC.php';
$reclamationC = new reclamationC();

$error = "";
$reclamation = null;


if (
    isset($_POST["titre"]) &&
    isset($_POST["date"]) &&
    isset($_POST["type_reclamation"]) &&
    isset($_POST["description"]) 
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["date"]) &&
        !empty($_POST["type_reclamation"]) &&
        !empty($_POST["description"]) 
    ) {
        $reclamation = new reclamation(
            null,
            $_POST['titre'],
            $_POST['date'],
            $_POST['type_reclamation'],
            $_POST['description']
        );
        
        // Ajouter la formation à la base de données
        $reclamationC->addreclamation($reclamation);
        
        header('Location: Listrec.php');
    exit();
    } else {
        $error = "Missing information";
    }
}