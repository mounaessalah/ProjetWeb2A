document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("insertForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        validateForm();
    });

    function validateForm() {
        let errors = [];

        const titre = form.elements["titre"].value.trim();
        const description = form.elements["description"].value.trim();
        const duree = form.elements["duree"].value.trim();
        const prix = form.elements["prix"].value.trim();

        if (titre === "") {
            errors.push("Le champ Titre ne peut pas être vide.");
        }

        if (description === "") {
            errors.push("Le champ Description ne peut pas être vide.");
        }

        if (duree === "") {
            errors.push("Le champ Durée ne peut pas être vide.");
        }

        if (prix === "") {
            errors.push("Le champ Prix ne peut pas être vide.");
        } else if (isNaN(prix)) {
            errors.push("Le champ Prix doit être un nombre.");
        }

        if (errors.length > 0) {
            const errorMessage = errors.join("<br>");
            displayError(errorMessage);
        } else {
            form.submit();
        }
    }

    function displayError(message) {
        const errorDiv = document.getElementById("error");
        errorDiv.innerHTML = `<div class="alert alert-danger">${message}</div>`;
    }
});
