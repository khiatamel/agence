<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/ajouHotel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    <title>Sanhadja Voyage</title>
</head>
<body>
    <div class="details">
        <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Créer un Hôtel </h2>
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="nom">Nom de l'hôtel:</label>
                    <input type="text" name="nom" required value="{{ old('nom') }}">
                </div>
                <div class="user-input-box">
                    <label for="adresse">Adresse:</label>
                    <input type="text" name="adresse" required value="{{ old('adresse') }}">
                </div>
                <div class="user-input-box">
                    <label for="desc">Description:</label>
                    <textarea name="desc" required>{{ old('desc') }}</textarea>
                </div>
                <div class="user-input-box">
                    
                </div>

                <!-- Sélection des services de l'hôtel -->
                <div class="user-input-bo">
                    <label for="petit_dejeuner">Petit Déjeuner:</label>
                    <input type="checkbox" name="petit_dejeuner" {{ old('petit_dejeuner') ? 'checked' : '' }}>
                </div>
                <div class="user-input-bo">
                    <label for="all_inclusive">All Inclusive:</label>
                    <input type="checkbox" name="all_inclusive" {{ old('all_inclusive') ? 'checked' : '' }}>
                </div>
                <div class="user-input-bo">
                    <label for="demi_pension">Demi Pension:</label>
                    <input type="checkbox" name="demi_pension" {{ old('demi_pension') ? 'checked' : '' }}>
                </div>
                <div class="user-input-bo">
                    <label for="all_insoft">All In Soft:</label>
                    <input type="checkbox" name="all_insoft" {{ old('all_insoft') ? 'checked' : '' }}>
                </div>
                <div class="user-input-bo">
                    <label for="pension_complete">Pension Complète:</label>
                    <input type="checkbox" name="pension_complete" {{ old('pension_complete') ? 'checked' : '' }}>
                </div>
                <div class="user-input-bo">
                    <label for="vue_mer">Vue Mer:</label>
                    <input type="checkbox" name="vue_mer" {{ old('vue_mer') ? 'checked' : '' }}>
                </div>
            </div>

            <!-- Ajout des tarifs -->
            <h3>Tarifs</h3>
            <div id="tarifs-container" class="main-user-info">
                <div class="tarif-item">
                    <label for="tarifs[0][condition]">Condition:</label>
                    <input type="text" name="tarifs[0][condition]" required value="{{ old('tarifs[0][condition]') }}">
                    
                    <label for="tarifs[0][prix]">Prix:</label>
                    <input type="number" name="tarifs[0][prix]" required value="{{ old('tarifs[0][prix]') }}">
                </div>
            </div>
            <div class="form-submit">
                <button class="tarif" type="button" id="add-tarif">Ajouter un Tarif</button>
            </div>

            <!-- Ajout des photos -->
            <h3>Photos de l'hôtel</h3>
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="photos">Entrer les photos:</label>
                    <input type="file" name="photos[]" multiple>
                </div>
            </div>

            <div class="form-submit-btn">
                <button type="submit">Créer l'Hôtel</button>
            </div>
        </form>
    </div>

    <script>
        let tarifIndex = 1;

        // Ajouter un autre tarif
        document.getElementById('add-tarif').addEventListener('click', function () {
            const container = document.getElementById('tarifs-container');
            const newTarif = `
                <div class="tarif-item">
                    <label for="tarifs[${tarifIndex}][condition]">Condition:</label>
                    <input type="text" name="tarifs[${tarifIndex}][condition]" required>

                    <label for="tarifs[${tarifIndex}][prix]">Prix:</label>
                    <input type="number" name="tarifs[${tarifIndex}][prix]" required>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newTarif);
            tarifIndex++;
        });
    </script>
</body>
</html>
