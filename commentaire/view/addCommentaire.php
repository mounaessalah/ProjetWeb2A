<?php
include_once "C:/wamp64/www/commentaire/controller/commentaireC.php";
include_once "C:/wamp64/www/commentaire/model/commentaire.php";

$error = "";
// create Forum
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
    <title>commentaire</title>
   
    <!-- <script  src="../Controller/test.js"></script> -->
    
</head>

<body> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            animation: colorChange 5s infinite alternate;
            /* Pulsating background color */
        }

        @keyframes colorChange {
            0% {
                background-color: #f5f5f5;
            }

            100% {
                background-color: #ffcccb;
            }
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        #error {
            color: red;
            margin: 10px;
        }

        form {
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            /* Increased width */
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 15px;
            /* Increased padding */
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            /* Adjusted padding */
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #e91e63;
            color: #fff;
            padding: 10px 15px;
            /* Adjusted padding */
            border: none;
            cursor: pointer;
            border-radius: 4px;
            animation: floatButton 2s infinite;
        }

        @keyframes floatButton {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #c2185b;
        }

        input[type="reset"] {
            background-color: #007BFF;
        }
    </style>


    <a href="listCommentaire.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
        <tr>
                <td><label for="ID_commentaire">ID_commentaire :</label></td>
                <td>
                    <input type="text" id="ID_commentaire" name="ID_commentaire" />
                    <span id="erreurID_commentaire" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Auteur">Auteur :</label></td>
                <td>
                    <input type="text" id="Auteur" name="Auteur" />
                    <span id="erreurAuteur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Contenu">Contenu :</label></td>
                <td>
                <input type="text" id="Contenu" name="Contenu" />
                    <span id="erreurContenu" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="Date_création">Date_création :</label></td>
                <td>
                    <input type="date" id="Date_création" name="Date_création" />
                    <span id="erreurDate_création" style="color: red"></span>
                </td>
            </tr>
            <td>
            <input type="submit" onclick=" return verif()" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>
</html>