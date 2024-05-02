document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("insertForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        validateForm();
    });

    function validateForm() {
        const titre = form.elements["titre"].value.trim();
        const description = form.elements["description"].value.trim();
        const dateDebut = new Date(form.elements["date_debut"].value);
        const dateFin = new Date(form.elements["date_fin"].value);
        const heureDebut = form.elements["heure_debut"].value;
        const heureFin = form.elements["heure_fin"].value;
        const errorTitre = document.getElementById("error-titre");
        const validTitre = document.getElementById("valid-titre");
        const errorDescription = document.getElementById("error-description");
        const validDescription = document.getElementById("valid-description");
        const errorDate = document.getElementById("error-date");
        const validDate = document.getElementById("valid-date");
        const errorHeure = document.getElementById("error-heure");
        const validHeure = document.getElementById("valid-heure");

        // Validation du titre et de la description
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

        // Validation des dates
        const now = new Date(); // Date actuelle
        const sixDaysFromNow = new Date(now.getTime() + (6 * 24 * 60 * 60 * 1000)); // 6 jours à partir de maintenant
        
        if (dateDebut < sixDaysFromNow) {
            errorDate.textContent = "La date de début doit être au moins 6 jours après la date actuelle.";
            errorDate.style.visibility = "visible";
        } else if (dateFin <= dateDebut) {
            errorDate.textContent = "La date de fin doit être après la date de début.";
            errorDate.style.visibility = "visible";
        } else {
            errorDate.style.visibility = "hidden";
        }

        // Validation des heures si les dates sont les mêmes
        if (dateDebut.toDateString() === dateFin.toDateString() && heureDebut >= heureFin) {
            errorHeure.textContent = "L'heure de début doit être antérieure à l'heure de fin.";
            errorHeure.style.visibility = "visible";
        } else {
            errorHeure.style.visibility = "hidden";
        }
    }

    function containsSymbol(text) {
        const symbolRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
        return symbolRegex.test(text);
    }
});
