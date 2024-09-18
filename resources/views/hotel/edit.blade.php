<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/AjouHotel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">

    <title>Sanhadja Voyage</title>
</head>
<body>
<div class="details">
    <h2>Modifier l'Hôtel</h2>

    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Détails de l'hôtel -->
            
        <div class="main-user-info">
            <div class="user-input-box">
                <label for="nom">Nom de l'hôtel:</label>
                <input type="text" name="nom" value="{{ $hotel->nom }}" required>
            </div>

            <div class="user-input-box">
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" value="{{ $hotel->adresse }}" required>
            </div>

            <div class="user-input-box">
                <label for="desc">Description:</label>
                <textarea name="desc" required>{{ $hotel->desc }}</textarea>
            </div>

            
            <div class="user-input-box">
            </div>

            <!-- Services de l'hôtel -->
            <div class="user-input-box">
                <label><input type="checkbox" name="petit_dejeuner" {{ $hotel->petit_dejeuner ? 'checked' : '' }}> Petit Déjeuner</label>
            </div>

            <div class="user-input-box">
                <label><input type="checkbox" name="all_inclusive" {{ $hotel->all_inclusive ? 'checked' : '' }}> All Inclusive</label>
            </div>

            <div class="user-input-box">
                <label><input type="checkbox" name="demi_pension" {{ $hotel->demi_pension ? 'checked' : '' }}> Demi Pension</label>
            </div>

            <div class="user-input-box">
                <label><input type="checkbox" name="all_insoft" {{ $hotel->all_insoft ? 'checked' : '' }}> All In Soft</label>
            </div>

            <div class="user-input-box">
                <label><input type="checkbox" name="pension_complete" {{ $hotel->pension_complete ? 'checked' : '' }}> Pension Complète</label>
            </div>

            <div class="user-input-box">
                <label><input type="checkbox" name="vue_mer" {{ $hotel->vue_mer ? 'checked' : '' }}> Vue Mer</label>
            </div>

        </div>
        <h3>Tarifs Existants</h3>
        <div id="tarifs-container" class="main-user-info">
             @foreach($hotel->tarifs as $tarif)
                <div class="tarif-item" class="main-user-info">
                    <label for="tarifs[{{ $tarif->id }}][condition]">Condition:</label>
                    <input type="text" name="tarifs[{{ $tarif->id }}][condition]" value="{{ $tarif->condition }}">
        
                    <label for="tarifs[{{ $tarif->id }}][prix]">Prix:</label>
                    <input type="number" name="tarifs[{{ $tarif->id }}][prix]" value="{{ $tarif->prix }}">
        
                    <!-- Delete Option for Tariff -->
                     <button type="button" class="delete-tarif" data-id="{{ $tarif->id }}">Supprimer</button>
                </div>
              @endforeach
            </div>

            <!-- New Tariff Addition -->
            <h3>Ajouter de nouveaux Tarifs</h3>
            <div id="tarifs-container" class="main-user-info">
                <div class="tarif-item">
                    <label for="tarifs_new[0][condition]">Condition:</label>
                    <input type="text" name="tarifs_new[0][condition]">

                    <label for="tarifs_new[0][prix]">Prix:</label>
                    <input type="number" name="tarifs_new[0][prix]">
                </div>
            </div>
            <div class="form-submit">
                <button class="tarif" type="button" id="add-tarif">Ajouter un Tarif</button>
            </div>

  <!-- Existing Photos with Delete Option -->
  <h3>Photos Existantes</h3>
  <div id="photos-container">
    @foreach($hotel->photos as $photo)
      <div class="photo-box" style="position: relative;">
        <img src="{{asset('/storage/images/'.$photo->photo)}}" alt="Photo" width="100">
        <!-- Delete Option for Photo -->
        <button type="button" class="delete-photo" data-id="{{ $photo->id }}"><span class="icon"><i class="fas fa-window-close" ></i></span></button>
      </div>
    @endforeach
  </div>

  <!-- New Photo Addition -->
  <h3>Ajouter de nouvelles Photos</h3>
  <div class="main-user-info">
    <div class="user-input-box">
      <label for="photos_new[]">Entrer les nouvelles photos:</label>
      <input type="file" name="photos_new[]" multiple>
    </div>
  </div>


            <!-- Bouton de soumission -->
            <button type="submit">Mettre à jour l'Hôtel</button>
        </form>

<script>
  // Handle deleting a tariff
  document.querySelectorAll('.delete-tarif').forEach(function(button) {
    button.addEventListener('click', function() {
      const tarifId = this.getAttribute('data-id');
      // Mark the tariff as deleted by appending a hidden input
      const input = `<input type="hidden" name="deleted_tarifs[]" value="${tarifId}">`;
      this.parentElement.insertAdjacentHTML('beforeend', input);
      this.parentElement.style.display = 'none'; // Optionally hide the deleted tariff
    });
  });

  // Handle deleting a photo
  document.querySelectorAll('.delete-photo').forEach(function(button) {
    button.addEventListener('click', function() {
      const photoId = this.getAttribute('data-id');
      // Mark the photo as deleted by appending a hidden input
      const input = `<input type="hidden" name="deleted_photos[]" value="${photoId}">`;
      this.parentElement.insertAdjacentHTML('beforeend', input);
      this.parentElement.style.display = 'none'; // Optionally hide the deleted photo
    });
  });

  // Add new tariffs dynamically
let tarifIndex = 1;
document.getElementById('add-tarif').addEventListener('click', function () {
  const container = document.getElementById('tarifs-container');
  const newTarif = `
    <div class="tarif-item">
      <label for="tarifs_new[${tarifIndex}][condition]">Condition:</label>
      <input type="text" name="tarifs_new[${tarifIndex}][condition]">

      <label for="tarifs_new[${tarifIndex}][prix]">Prix:</label>
      <input type="number" name="tarifs_new[${tarifIndex}][prix]">
    </div>
  `;
  container.insertAdjacentHTML('beforeend', newTarif);
  tarifIndex++;
});
</script>

    </div>
</body>
</html>
