<?php

// Include necessary files and classes
require_once 'C:\xampp\htdocs\MindFullPaths\config.php'; // Assuming you have a config.php file for database connection
require_once 'C:\xampp\htdocs\MindFullPaths\Model\Cours.php';
require_once 'C:\xampp\htdocs\MindFullPaths\Controller\CoursC.php';

// Initialize CoursC object
$CoursC = new CoursC();

// Add CoursC
if (isset($_POST['add'])) {
    $Titre = $_POST['Titre'];
    $Prerequis = $_POST['Prerequis'];
    $Nombre = $_POST['Nombre'];
;

    $Cours = new Cours();

    
    $Cours->setTitre($Titre);
    $Cours->setPrerequis($Prerequis);
    $Cours->setNombre($Nombre);

    $CoursC->addCourse($Cours);

    // Redirect to the page after adding
    header('Location: Cours.php'); // Replace 'destination.php' with the appropriate page
    exit();
}




// Update CoursC
if (isset($_POST['edit'])) {
    $idC = $_POST['idC'];
    $Titre = $_POST['Titre'];
    $Prerequis = $_POST['Prerequis'];
    $Nombre = $_POST['Nombre'];

    $Cours = new Cours();
    $Cours->setIdC($idC);
    $Cours->setTitre($Titre);
    $Cours->setPrerequis($Prerequis);
    $Cours->setNombre($Nombre);

    $CoursC->modifyCourse($Cours);

    // Redirect to the page after updating
    header('Location: Cours.php'); // Replace 'Cours.php' with the appropriate page
    exit();
}




// Delete Reclamation
if (isset($_GET['delete'])) {
    $idC = $_GET['delete'];
    $CoursC->deleteCourse($idC);

    // Redirect back to the page after deleting
    header('Location: Cours.php'); // Replace 'Reclamation.php' with the appropriate page
    exit();
}


// Handle other cases or errors
?>