document.addEventListener('DOMContentLoaded', function () {
    var validateButton = document.getElementById('validateButton');

    validateButton.addEventListener('click', function () {
        var id_Forum = document.getElementById('id_forum').value;
        var titre = document.getElementById('titre').value;
        var description = document.getElementById('description').value;
        var date = document.getElementById('date').value;
        var categorie = document.getElementById('categorie').value;

        if (id_Forum.trim() === '') {
            alert('Please enter a forum ID.');
            return;
        }

        if (titre.trim() === '') {
            alert('Please enter a title.');
            return;
        }

        if (description.trim() === '') {
            alert('Please enter a description.');
            return;
        }

        if (date.trim() === '') {
            alert('Please select a date.');
            return;
        }

        if (categorie.trim() === '') {
            alert('Please enter a category.');
            return;
        }

        // If all fields are valid, you can submit the form
        document.getElementById('forum').submit();
    });
});