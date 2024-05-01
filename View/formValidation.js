document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("insertForm");
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        validateForm();
    });

    function validateForm() {
        const titre = form.elements["titre"].value.trim();
        const description = form.elements["description"].value.trim();
        const categorie = form.elements["categorie_evenement"].value;
        
        const errorTitre = document.getElementById("error-titre");
        const validTitre = document.getElementById("valid-titre");
        const errorDescription = document.getElementById("error-description");
        const validDescription = document.getElementById("valid-description");
        const errorCategorie = document.getElementById("error-categorie");
        const validCategorie = document.getElementById("valid-categorie");

        if (titre === "") {
            errorTitre.textContent = "Le champ Titre ne peut pas être vide.";
            errorTitre.style.visibility = "visible";
            validTitre.style.visibility = "hidden";
        } else if (containsSymbol(titre)) {
            errorTitre.textContent = "Le champ Titre ne peut pas contenir de symboles.";
            errorTitre.style.visibility = "visible";
            validTitre.style.visibility = "hidden";
        } else {
            errorTitre.style.visibility = "hidden";
            validTitre.style.visibility = "visible";
        }

        if (description === "") {
            errorDescription.textContent = "Le champ Description ne peut pas être vide.";
            errorDescription.style.visibility = "visible";
            validDescription.style.visibility = "hidden";
        } else if (containsSymbol(description)) {
            errorDescription.textContent = "Le champ Description ne peut pas contenir des symboles.";
            errorDescription.style.visibility = "visible";
            validDescription.style.visibility = "hidden";
        } else {
            errorDescription.style.visibility = "hidden";
            validDescription.style.visibility = "visible";
        }
        if (categorie === "") {
            errorCategorie.textContent = "Veuillez sélectionner une catégorie.";
            errorCategorie.style.visibility = "visible";
            validCategorie.style.visibility = "hidden";
        } else {
            errorCategorie.style.visibility = "hidden";
            validCategorie.style.visibility = "visible";
        }
        
    }

    function containsSymbol(text) {
        const symbolRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
        return symbolRegex.test(text);
    }
});
