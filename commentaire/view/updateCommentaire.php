<?php
include_once "";
include_once "../model/commentaire.php";

$error = "";

// create commentaire
$commentaire = null;
// create an instance of the controller
$commentaireC = new commentaireC();

if (
    isset($_POST["Auteur"]) &&
    isset($_POST["Contenu"]) &&
    isset($_POST["Date_création"]) 
  
) {
    if (
        !empty($_POST["Auteur"]) &&
        !empty($_POST["Contenu"]) &&
        !empty($_POST["Date_création"]) 
    
    ) {
        $commentaire = new commentaire(
            null,
            $_POST["Auteur"],
            $_POST["Contenu"],
            new DateTime($_POST["Date_création"])
            
        );

        $commentaireC->addCommentaire($commentaire);
        header('Location:listCommentaire.php');
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
<button><a href="listCommentaire.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['ID_commentaire'])) {
        $commentaire = $commentaireC->showCommentaire($_POST['ID_commentaire']);
        
    ?>

<form action="" method="POST">
<table border="2" align="center">
        <tr>
                <td><label for="ID_commentaire">ID_commentaire :</label></td>
                <td>
                    <input type="text" id="ID_commentaire" name="ID_commentaire"  value="<?php echo $commentaire['ID_commentaire'] ?>"/>
                    <span id="erreurID_commentaire" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Auteur">Auteur :</label></td>
                <td>

                    <input type="text" id="Auteur" name="Auteur"  value="<?php echo $commentaire['Auteur'] ?>" />
                    <span id="erreurAuteur" style="color: red"></span>
                </td>
            </tr>
           
                 <tr>
            <td><label for="Contenu">Contenu :</label></td>
             <td> <input type="text" id="Contenu" name="Contenu" value="<?php echo $commentaire['Contenu'] ?>"/> <span id="erreurContenu" style="color: red"></span> </td> </tr>
            
                </td>
            </tr>
            
            <tr>
            <td><label for="Date_création">Date_création :</label></td>
                <td>
                    <input type="Date" id="Date_création" name="Date_création" value="<?php echo $commentaire['Date_création'] ?>" />
 
                    <span id="erreurDate_création" style="color: red"></span>
                </td>
             
            

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
    
    
