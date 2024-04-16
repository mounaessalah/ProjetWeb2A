<?php
include_once "../controller/commentaireC.php";
$commentaireC = new commentaireC();
$commentaireC->deleteCommentaire($_GET["ID_commentaire"]);
header('Location:listCommentaire.php');
?>