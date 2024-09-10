document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("editProgrammeOmraModal");
    var closeBtn = document.querySelector(".close");
    
    // Open modal when edit button is clicked
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const programmeOmraId = this.dataset.id;

            // Set the form action URL
            document.getElementById('editProgrammeOmraForm').action = `/programme_omras/${programmeOmraId}`;

            // Fetch the existing data using AJAX and populate the form
            fetch(`/programme_omras/${programmeOmraId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_départ').value = data.départ;
                    document.getElementById('edit_retour').value = data.retour;
                    document.getElementById('edit_heurD').value = data.retour;
                    // Populate other fields as needed
                });

            modal.style.display = "block";
        });
    });

    // Close the modal when the close button is clicked
    closeBtn.addEventListener('click', function() {
        modal.style.display = "none";
    });

    // Close the modal when the user clicks anywhere outside of it
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
});

