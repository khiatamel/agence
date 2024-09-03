// car-models.js

const carModels = {
    "acura": ["ILX", "MDX", "RDX", "TLX"],
    "alfa-romeo": ["Giulia", "Stelvio", "4C Spider"],
    "aston-martin": ["DB11", "Vantage", "DBX"],
    "audi": ["A3", "A4", "Q5", "Q7", "R8"],
    "bentley": ["Bentayga", "Continental GT", "Flying Spur"],
    "bmw": ["3 Series", "5 Series", "X3", "X5", "Z4"],
    "bugatti": ["Chiron", "Veyron"],
    "buick": ["Enclave", "Encore", "Regal"],
    "cadillac": ["ATS", "Escalade", "XT5"],
    "chevrolet": ["Camaro", "Corvette", "Silverado", "Tahoe"],
    "chrysler": ["300", "Pacifica", "Voyager"],
    "citroen": ["C3", "C4", "C5 Aircross"],
    "dacia": ["Duster", "Sandero", "Logan"],
    "daewoo": ["Matiz", "Nubira", "Lanos"],
    "daihatsu": ["Terios", "Copen", "Sirion"],
    "dodge": ["Charger", "Durango", "Ram"],
    "ferrari": ["488", "Portofino", "F8"],
    "fiat": ["500", "Panda", "Tipo"],
    "ford": ["Focus", "Mustang", "Explorer", "F-150"],
    "genesis": ["G70", "G80", "GV80"],
    "gmc": ["Acadia", "Sierra", "Yukon"],
    "honda": ["Accord", "Civic", "CR-V", "Pilot"],
    "hummer": ["H1", "H2", "H3"],
    "hyundai": ["Elantra", "Santa Fe", "Tucson"],
    "infiniti": ["Q50", "QX60", "QX80"],
    "jaguar": ["F-Type", "XE", "XF"],
    "jeep": ["Cherokee", "Grand Cherokee", "Wrangler"],
    "kia": ["Forte", "Sorento", "Sportage"],
    "lamborghini": ["Aventador", "Huracan", "Urus"],
    "land-rover": ["Defender", "Discovery", "Range Rover"],
    "lexus": ["ES", "RX", "GX"],
    "lincoln": ["Aviator", "Corsair", "Navigator"],
    "maserati": ["Ghibli", "Levante", "Quattroporte"],
    "mazda": ["CX-3", "CX-5", "Mazda3"],
    "mclaren": ["570S", "720S", "GT"],
    "mercedes-benz": ["C-Class", "E-Class", "GLC", "S-Class"],
    "mini": ["Cooper", "Countryman", "Clubman"],
    "mitsubishi": ["Lancer", "Outlander", "Pajero"],
    "nissan": ["Altima", "GT-R", "Rogue", "Sentra"],
    "pagani": ["Huayra", "Zonda"],
    "peugeot": ["208", "3008", "5008"],
    "porsche": ["911", "Cayenne", "Taycan"],
    "ram": ["1500", "2500", "3500"],
    "renault": ["Clio", "Megane", "Scenic"],
    "rolls-royce": ["Ghost", "Phantom", "Wraith"],
    "saab": ["9-3", "9-5", "900"],
    "seat": ["Arona", "Ibiza", "Leon"],
    "skoda": ["Fabia", "Octavia", "Superb"],
    "subaru": ["Forester", "Impreza", "Outback"],
    "suzuki": ["Vitara", "Swift", "Jimny"],
    "tesla": ["Model 3", "Model S", "Model X", "Model Y"],
    "toyota": ["Camry", "Corolla", "Highlander", "RAV4"],
    "volkswagen": ["Golf", "Jetta", "Passat", "Tiguan"],
    "volvo": ["S60", "XC40", "XC90"]
};

function updateModels() {
    const carBrandSelect = document.getElementById('car-brand');
    const carModelSelect = document.getElementById('car-model');
    
    const selectedBrand = carBrandSelect.value;
    const models = carModels[selectedBrand] || [];

    // Clear existing options
    carModelSelect.innerHTML = '<option value="">Sélectionnez un modèle</option>';
    
    // Populate new options
    models.forEach(model => {
        const option = document.createElement('option');
        option.value = model.toLowerCase().replace(/ /g, "-");
        option.textContent = model;
        carModelSelect.appendChild(option);
    });
}
