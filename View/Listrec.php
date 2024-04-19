<?php
include '../Controller/reclamationC.php';

$reclamationC = new reclamationC();
$error = "";
$list = $reclamationC->listreclamations();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reclamation</title>
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
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <div class="text-body-secondary">
                <span class="h5">All reclamation</span>
                <br>
                Manage all your existing reclamation or add a new one
            </div>
            <!-- Button to trigger Add reclamation offcanvas -->
           < <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addreclamationModal">
                Add new reclamation
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addreclamationModal" tabindex="-1" aria-labelledby="addreclamationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addreclamationModalLabel">Add New reclamation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="error">
                            <?php echo $error; ?>
                        </div>
                 <form method="POST" id="insertForm" action="upload.php" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Titre</label>
                            <input type="text" class="form-control" name="titre" placeholder="reclamation Titre">
                        </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="reclamation Description">
                        </div>                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">date</label>
                            <input type="text" class="form-control" name="date" placeholder="reclamation date">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">type de reclamation</label>
                            <select class="form-select" name="type_reclamation">
                                <option value="pane_technique">pane technique</option>
                                <option value="service_client">service client</option>
                                
                            </select>         
                        </div>
                        
                   

                    <div>
                        <button type="submit" class="btn btn-outline-dark me-1" id="insertBtn">Submit</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>date</th>
            <th>type</th>
            <th>description</th>
            <th>Actions</th>
        </tr>

    </thead>
    <tbody>
        <?php
        foreach($list as $reclamation){
        ?>
        <tr>
            <td><?=$reclamation['id_reclamation'];?></td>
            <td><?=$reclamation['titre_reclamation'];?></td>
            <td><?=$reclamation['date_reclamation'];?></td>
            <td><?=$reclamation['type_reclamation'];?></td>
            <td><?=$reclamation['description_reclamation'];?></td>
            
            
            <td align="center">
                <a href="Updaterec.php?id=<?=$reclamation['id_reclamation'];?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Update</a>
                <a href="Deleterec.php?id=<?=$reclamation['id_reclamation'];?>" class="btn"><i class="fa-solid fa-trash fa-xl"></i>Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
        <script src="script.js"></script>

 </body>

</html>
<script> 
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('insertForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            var titre = form["titre"].value;
            var description = form["description"].value;
            var date = form["date"].value;

            if (titre.trim() === "" || description.trim() === "" || date.trim() === "") {
                alert("All fields must be filled out");
                event.preventDefault(); // Stop form submission
                return false;
            }

            // Validation for titre
            if (!/^[a-zA-Z0-9 ]+$/.test(titre)) {
                alert("Titre must only contain letters, numbers, and spaces");
                event.preventDefault();
                return false;
            }

            // Validation for description
            if (!/^[a-zA-Z0-9 ]+$/.test(description)) {
                alert("Description must only contain letters, numbers, and spaces");
                event.preventDefault();
                return false;
            }

            // Validation for date in YYYY-MM-DD format
            if (!/^\d{4}-\d{2}-\d{2}$/.test(date)) {
                alert("Date must be in YYYY-MM-DD format (e.g., 2023-01-25)");
                event.preventDefault();
                return false;
            }

            // Additional validation to ensure the date string represents a valid date
            var dateObj = new Date(date);
            if (!dateObj.getTime()) {
                alert("Invalid date. Please enter a valid date.");
                event.preventDefault();
                return false;
            }

            // Check to prevent JavaScript Date object from correcting invalid dates
            if (dateObj.getFullYear() !== parseInt(date.split("-")[0], 10) ||
                dateObj.getMonth() + 1 !== parseInt(date.split("-")[1], 10) || 
                dateObj.getDate() !== parseInt(date.split("-")[2], 10)) {
                alert("Entered date is invalid. Please check the date values.");
                event.preventDefault();
                return false;
            }

            return true; // If all validations pass, allow form submission
        });
    }
});
    
</script>