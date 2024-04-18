// validation.js

// Fonction de validation
function validateForum(event) {
    // Empêcher le comportement par défaut du formulaire'
    event.preventDefault();

    // Récupérer les valeurs des champs
    var id_forum = document.getElementById('id_forum').value;
    var titre = document.getElementById('titre').value;
    var description = document.getElementById('description').value;
    var date = document.getElementById('date').value;
    var categorie = document.getElementById('categorie').value;

    // Validation des champs (vous pouvez ajouter vos propres règles de validation)
    var isValid = true;

    // Vérification de l'id_forum
    if (id_forum === '') {
        document.getElementById('erreurid_forum').innerText = 'Veuillez entrer un id_forum';
        isValid = false;
    } else {
        document.getElementById('erreurid_forum').innerText = '';
    }

    // Vérification du titre
    if (titre === '') {
        document.getElementById('erreurtitre').innerText = 'Veuillez entrer un titre';
        isValid = false;
    } else {
        document.getElementById('erreurtitre').innerText = '';
    }

    // Vérification de la description
    if (description === '') {
        document.getElementById('erreurdescription').innerText = 'Veuillez entrer une description';
        isValid = false;
    } else {
        document.getElementById('erreurdescription').innerText = '';
    }

    // Vérification de la date
    if (date === '') {
        document.getElementById('erreurdate').innerText = 'Veuillez entrer une date';
        isValid = false;
    } else {
        document.getElementById('erreurdate').innerText = '';
    }

    // Vérification de la catégorie
    if (categorie === '') {
        document.getElementById('erreurcategorie').innerText = 'Veuillez entrer une catégorie';
        isValid = false;
    } else {
        document.getElementById('erreurcategorie').innerText = '';
    }

    // Si toutes les validations sont passées, soumettre le formulaire
    if (isValid) {
        document.querySelector('form').submit();
    }
}

// Ajouter un écouteur d'événement sur le formulaire pour déclencher la validation au moment de la soumission
document.querySelector('form').addEventListener('submit',validateForum);
