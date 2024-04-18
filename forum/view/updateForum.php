<?php
include_once "c:/wamp64/www/evaluation/forum/controller/forumC.php";
include_once "c:/wamp64/www/evaluation/forum/model/forum.php";

$error = "";

// create forum
$forum = null;
// create an instance of the controller
$forumC = new forumC();

if (
    isset($_POST["id_forum"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["description"]) &&
    isset($_POST["date"]) &&
    isset($_POST["categorie"])
) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["categorie"])
    ) {
        $forum = new forum(
            $_POST["id_forum"],
            $_POST["titre"],
            $_POST["description"],
            new DateTime($_POST["date"]),
            $_POST["categorie"]
        );

        $forumC->updateForum($forum, $_POST['id_forum']);
        header('Location:listForum.php');
    } else {
        $error = "Missing information";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
<button><a href="listForum.php">Back to list</a></button>
    <hr>

    <div id="erreur">
        <?php echo $erreur; ?>
    </div>

    <?php
    if (isset($_POST['id_forum'])) {
        $forum = $forumC->showForum($_POST['id_forum']);
        
    ?>

<form action="" method="POST">
<table border="2" align="center">
        <tr>
                <td><label for="id_forum">id_forum :</label></td>
                <td>
                    <input type="text" id="id_forum" name="id_forum"  value="<?php echo $forum['id_forum'] ?>"/>
                    <span id="erreurid_forum" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="titre">titre :</label></td>
                <td>

                    <input type="text" id="titre" name="titre"  value="<?php echo $forum['titre'] ?>" />
                    <span id="erreurtitre" style="color: red"></span>
                </td>
            </tr>
           
                 <tr>
            <td><label for="description">description :</label></td>
             <td> <input type="text" id="description" name="description" value="<?php echo $forum['description'] ?>"/> <span id="erreurdescription" style="color: red"></span> </td> </tr>
            
                </td>
            </tr>
            
            <tr>
            <td><label for="date">date :</label></td>
                <td>
                    <input type="date" id="date" name="date" value="<?php echo $forum['date'] ?>" />
 
                    <span id="erreurdate" style="color: red"></span>
                </td>
             
            <tr>
                <td><label for="categorie">categorie :</label></td>
                <td>
                    <input type="text" id="categorie" name="categorie" value="<?php echo $forum['categorie'] ?>" />
                    <span id="erreurcategorie" style="color: red"></span>
                </td>
            </tr>

            <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
        </table>
        </form>
        <?php
    }
    ?>
    </body>
    </html>
    
    
