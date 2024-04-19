<?php
include '../Controller/reclamationC.php';

$reclamationC = new reclamationC();

$error = "";
$reclamation = null;

if (
    isset($_POST["titre_reclamation"]) &&
    isset($_POST["date_reclamation"]) &&
    isset($_POST["type_reclamation"]) &&
    isset($_POST["description_reclamation"]) 
) {
    if (
        !empty($_POST['titre_reclamation']) &&
        !empty($_POST["date_reclamation"]) &&
        !empty($_POST["type_reclamation"]) &&
        !empty($_POST["description_reclamation"]) 
    ) {
        $id = $_GET['id'];

        // Create a new reclamation object
        $reclamation = new reclamation(
            $id,
            $_POST['titre_reclamation'],
            $_POST['date_reclamation'],
            $_POST['type_reclamation'],
            $_POST['description_reclamation']
        );

        $reclamationC->updatereclamation($reclamation, $id);
        header("Location: Listrec.php"); // Replace "index.php" with the desired page URL
    } else {
        $error = "Missing reclamation";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP reclamation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Datatables CSS  -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <!-- CSS  -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // Include the header content
    include 'Header.php';
    ?>
    <div class="container">


<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reclamation = $reclamationC->showreclamation($id);
?>

           <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Update reclamation</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <form method="POST" id="insertForm" action="">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Titre</label>
                            <input type="text" class="form-control" name="titre_reclamation" placeholder="Titre" value="<?php echo $reclamation['titre_reclamation']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">date</label>
                            <input type="text" class="form-control" name="date_reclamation" placeholder="date" value="<?php echo $reclamation['date_reclamation']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                        <label class="form-label">type</label>
                                    <select class="form-select" name="type_reclamation">
                                    <option value="pane_technique" <?php if ($reclamation['type_reclamation'] == 'pane_technique') echo 'selected'; ?>>pane technique</option>
                                    <option value="service client" <?php if ($reclamation['type_reclamation'] == 'service_client') echo 'selected'; ?>>service client</option>
                                    
                                    </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">description</label>
                            <textarea class="form-control" name="description_reclamation" rows="3"><?php echo $reclamation['description_reclamation']; ?></textarea>
                        </div>
                    </div>

                    
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                 </form>
                 </div>
                 </div>



    <?php } else { ?>
        <div class="alert alert-danger">Invalid reclamation</div>
    <?php } ?>


</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-CUHvRlX0f3QbhHV5j7NLVz3+WYyJqU5Rc4x2Qz03mBDbd6vGnW6nq0tVJjv3KtXV" crossorigin="anonymous"></script>
<!-- Datatables JS -->
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
<!-- Custom JS -->
</body> 
</html>



     
   


     
     