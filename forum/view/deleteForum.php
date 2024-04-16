<?php
include_once "../controller/forumC.php";
$forumC = new forumC();
$forumC->deleteForum($_GET["id_forum"]);
header('Location:listForum.php');
?>