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