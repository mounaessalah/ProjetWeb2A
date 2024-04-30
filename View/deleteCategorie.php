
<?php
include '../Controller/categorieC.php';

$categorieC = new categorieC();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $categorieC->deleteCategorie($id);
    header("Location: uploadcategorie.php"); // Replace "index.php" with the desired page URL
    exit();
}