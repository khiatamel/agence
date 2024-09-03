// routes.js

// Object mapping bateau, départ, and destination
const routes = {
    "balearia": {
        "Mostaganem": ["Valence"],
        "Oran": ["Alicante"]
    },
    "corsica": {
        "Alger": ["Marseille"]
    }
};

function updateRoutes() {
    const bateauSelect = document.getElementById('bateau');
    const departSelect = document.getElementById('depart');
    const destinationSelect = document.getElementById('destination');
    
    const selectedBateau = bateauSelect.value;

    // Clear existing options
    departSelect.innerHTML = '<option value="">Sélectionnez un départ</option>';
    destinationSelect.innerHTML = '<option value="">Sélectionnez une destination</option>';

    // Populate Départ options based on selected Bateau
    if (selectedBateau && routes[selectedBateau]) {
        Object.keys(routes[selectedBateau]).forEach(depart => {
            const option = document.createElement('option');
            option.value = depart.toLowerCase().replace(/ /g, "-");
            option.textContent = depart;
            departSelect.appendChild(option);
        });
    }
}

// Event listener to update destinations when a departure is selected
document.getElementById('depart').addEventListener('change', function() {
    const bateauSelect = document.getElementById('bateau');
    const departSelect = document.getElementById('depart');
    const destinationSelect = document.getElementById('destination');
    
    const selectedBateau = bateauSelect.value;
    const selectedDepart = departSelect.options[departSelect.selectedIndex].text;
    
    // Clear the destination options
    destinationSelect.innerHTML = '<option value="">Sélectionnez une destination</option>';
    
    // Populate destination options based on selected Depart
    if (selectedBateau && selectedDepart && routes[selectedBateau][selectedDepart]) {
        routes[selectedBateau][selectedDepart].forEach(dest => {
            const option = document.createElement('option');
            option.value = dest.toLowerCase().replace(/ /g, "-");
            option.textContent = dest;
            destinationSelect.appendChild(option);
        });
    }
});
