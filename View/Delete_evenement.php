<?php
include '../Controller/evenementC.php';

$evenementC = new evenementC();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $evenementC->deleteEvenement($id);
    header("Location: ListEvenement.php"); // Replace "index.php" with the desired page URL
    exit();
}
