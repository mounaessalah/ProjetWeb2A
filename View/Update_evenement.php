<?php
include '../Controller/evenementC.php';
include '../Controller/categorieC.php';
$evenementC = new evenementC();
$categorieC = new categorieC();


// Inclure vos fichiers de classe et initialisations ici

$error = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider les données du formulaire
    if (
        isset($_POST["id"]) &&
        isset($_POST["titre_evenement"]) &&
        isset($_POST["date_debut"]) &&
        isset($_POST["heure_debut"]) &&
        isset($_POST["heure_fin"]) &&
        isset($_POST["date_fin"]) &&
        isset($_POST["description_evenement"]) &&
        isset($_POST["idCategorie"]) &&
        isset($_POST["prix_evenement"])
    ) {
        // Récupérer l'ID de l'événement
        $id = $_POST["id"];

        // Récupérer l'événement à mettre à jour
        $evenement = $evenementC->showevenement($id);

        if ($evenement) {
            // Assurez-vous que les champs requis ne sont pas vides
            if (!empty($_POST["titre_evenement"])) {
                $evenement->setTitre_evenement($_POST["titre_evenement"]);
            }
            if (!empty($_POST["date_debut"])) {
                $evenement->setDate_debut($_POST["date_debut"]);
                
            }
            if (!empty($_POST["heure_debut"])) {
                $evenement->setHeure_debut($_POST["heure_debut"]);
                
            }
            if (!empty($_POST["heure_fin"])) {
                $evenement->setheure_fin($_POST["heure_fin"]);
                
            }
            if (!empty($_POST["date_fin"])) {
                $evenement->setDate_fin($_POST["date_fin"]);
                
            }
            if (!empty($_POST["description_evenement"])) {
                $evenement->setDescription_evenement($_POST["description_evenement"]);
            }
            if (!empty($_POST["idCategorie"])) {
                $evenement->setIdCategorie($_POST["idCategorie"]);
            }
            if (!empty($_POST["prix_evenement"])) {
                $evenement->setPrix_evenement($_POST["prix_evenement"]);
            }

            // Mettre à jour l'événement dans la base de données
            $evenementC->updateevenement($evenement, $id);

            // Afficher un message de succès à l'utilisateur
            $success_message = "L'événement a été mis à jour avec succès.";
        } else {
            $error = "L'événement que vous essayez de mettre à jour n'existe pas.";
        }
    } else {
        $error = "Une erreur s'est produite lors de la soumission du formulaire.";
    }
}

// Récupérer l'événement à mettre à jour
$id = $_GET['id'];
$evenement = $evenementC->showevenement($id);
$categories = $categorieC->listCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  

  <title>
    education et formation
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Modifier un événement</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Retour</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <?php if (!empty($success_message)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php } ?>
        <form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $evenement->getId_evenement(); ?>">
    <div class="mb-3">
        <label for="titre_evenement" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre_evenement" name="titre_evenement" value="<?php echo $evenement->getTitre_evenement(); ?>" placeholder="Titre">
    </div>
    <div class="mb-3">
        <label for="heure_debut" class="form-label">date debut</label>
        <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?php echo $evenement->getDate_debut(); ?>" placeholder="date_debut">
    </div>
    <div class="mb-3">
        <label for="heure_debut" class="form-label">heure debut</label>
        <input type="time" class="form-control" id="heure_debut" name="heure_debut" value="<?php echo $evenement->getHeure_debut(); ?>" placeholder="heure_debut">
    </div>
    <div class="mb-3">
        <label for="heure_debut" class="form-label">heure fin</label>
        <input type="time" class="form-control" id="heure_fin" name="heure_fin" value="<?php echo $evenement->getheure_fin(); ?>" placeholder="heure_fin">
    </div>
    <div class="mb-3">
        <label for="heure_debut" class="form-label">date fin</label>
        <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?php echo $evenement->getDate_fin(); ?>" placeholder="date_fin">
    </div>
    <div class="mb-3">
        <label for="description_evenement" class="form-label">Description</label>
        <textarea class="form-control" id="description_evenement" name="description_evenement" rows="3" placeholder="Description"><?php echo $evenement->getDescription_evenement(); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="idCategorie" class="form-label">Catégorie</label>
        <select class="form-select" name="idCategorie">
            <?php foreach ($categories as $categorie) { ?>
                <option value="<?php echo $categorie['idCategorie']; ?>" <?php if ($evenement->getIdCategorie() == $categorie['idCategorie']) echo "selected"; ?>><?php echo $categorie['nom']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="prix_evenement" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix_evenement" name="prix_evenement" value="<?php echo $evenement->getPrix_evenement(); ?>" placeholder="Prix">
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn btn-secondary">Annuler</button>
</form>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Vos autres scripts JavaScript ici -->
</body>

</html>



     
     