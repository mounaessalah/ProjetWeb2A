<?php
include '../Controller/reclamationC.php';

$reclamationC = new reclamationC();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reclamationC->deletereclamation($id);
    header("Location: Listrec.php"); // Replace "index.php" with the desired page URL
    exit();
}