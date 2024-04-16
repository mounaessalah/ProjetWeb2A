<?php
include_once "../controller/forumC.php";
include_once "../model/forum.php";

$error = "";
// create Forum
$forum = null;

// create an instance of the controller
$forumC = new forumC();

if (
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
            null,
            $_POST["titre"],
            $_POST["description"],
            new DateTime($_POST["date"]),
            $_POST["categorie"]
        );

        $forumC->addForum($forum);
        header('Location:listForum.php');
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Clean Up Nation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Forum </title>

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


    <a href="listForum.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
        <tr>
                <td><label for="id_forum">id_forum :</label></td>
                <td>
                    <input type="text" id="id_forum" name="id_forum" />
                    <span id="erreurid_forum" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="titre">titre :</label></td>
                <td>
                    <input type="text" id="titre" name="titre" />
                    <span id="erreurtitre" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                <input type="text" id="description" name="description" />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date">date :</label></td>
                <td>
                    <input type="date" id="date" name="date" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="categorie">categorie :</label></td>
                <td>
                <input type="text" id="categorie" name="categorie" />
                    <span id="erreurcategorie" style="color: red"></span>
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