// Get the popup element
var popup = document.getElementById("reservationPopup");

// Function to open the popup
function openReservationPopup() {
    popup.style.display = "block"; // Show the popup
}

// Function to close the popup when the 'x' is clicked
document.querySelector(".close").onclick = function() {
    popup.style.display = "none"; // Hide the popup
}
 
   // Fermer le popup
   function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
  }

// Optional: Close the popup if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none"; // Hide the popup
    }
}

// Function to dynamically generate age fields based on number of children
function generateChildAgeFields() {
    var childrenCount = document.getElementById("childrenCount").value;
    var childrenAges = document.getElementById("childrenAges");

    // Clear any existing fields
    childrenAges.innerHTML = '';

    // Generate fields based on the number of children
    for (var i = 0; i < childrenCount; i++) {
        var label = document.createElement("label");
        label.innerHTML = "Âge de l'enfant " + (i + 1) + ":";
        var input = document.createElement("input");
        input.type = "number";
        input.name = "childAge" + (i + 1);
        input.min = 0;
        input.max = 18;
        input.required = true;

        childrenAges.appendChild(label);
        childrenAges.appendChild(input);
    }
}
