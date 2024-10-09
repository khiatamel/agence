<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/ajouter.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    <title>Sanhadja Voyage</title>
</head>
<body>
<div class="container">
    <div class="main">
        <div class="topbar">
            <div class="user">
                <li class="navbar-item">    

                </li>
            </div>
            
                <div class="reservation-info">
                    <p>⚠️ La réservation sera effectuée. Si elle est acceptée, il faudra faire le paiement pour la confirmation.</p>
                </div>
            <div class="toggle-form-container">
                <button id="toggleFormBtn" class="toggle-form-btn">Ajouter Client</button>
            </div>
        </div>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        <div class="details">
            
            <div class="recentOrders">
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1>Clients Omra {{ $omra->nom}}</h1>
                        <div class="input-group">
                            <input type="search" id="searchInput" placeholder="Search Data...">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                    </section>
                    <section class="table__body">
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Numéro Téléphone</th>
                                    <th>PassePort</th>
                                    <th>Photo</th>
                                    <th>Hotel</th>
                                    <th>Age(Enfant)</th>
                                    <th>Groupe</th>
                                    <th>Statut</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservation_omras as $reservation_omra)
                                 @if($reservation_omra->omraID == $omra->id && $reservation_omra->user_id == Auth::user()->id)
                                    <tr>
                                        <td>{{ $reservation_omra->nom }}</td>
                                        <td>{{ $reservation_omra->numero }}</td>
                                        <td><a href="{{ Storage::url($reservation_omra->passeport) }}" target="_blank">Voir le Passeport</a></td>
                                        <td><a href="{{ Storage::url($reservation_omra->photo) }}" target="_blank">Voir la Photo</a></td>
                                        <td>{{ $reservation_omra->hotel }}</td>
                                        <td>{{ $reservation_omra->age }}</td>
                                        <td>{{ $reservation_omra->group_name }}</td>
                                        @if($reservation_omra->statut == 'accepté')
                                            <td style="color: green;">{{ $reservation_omra->statut }}</td>
                                        @elseif($reservation_omra->statut == 'refusé')
                                            <td style="color: red;">{{ $reservation_omra->statut }}</td>
                                        @else
                                            <td style="color: blue;">{{ $reservation_omra->statut }}</td>
                                        @endif

                                        <td>
                                            <a href="#" class="edit-button"
                                               data-id="{{ $reservation_omra->id }}"
                                               data-nom="{{ $reservation_omra->nom }}"
                                               data-numero="{{ $reservation_omra->numero }}"
                                               data-passeport="{{ $reservation_omra->passeport }}"
                                               data-photo="{{ $reservation_omra->photo }}"
                                               data-age="{{ $reservation_omra->age }}"
                                               data-group_name="{{ $reservation_omra->group_name }}">
                                                <span class="icon"><i class="fas fa-pencil"></i></span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('reservation_omras.destroy', $reservation_omra->id) }}" method="POST" onsubmit="return confirm('vous êtes sûr?');" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button"><span class="icon"><i class="fas fa-trash"></i></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                  @endif                                
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </main>
            </div>

            <div id="formContainer" class="form-container" style="display: none;">
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h3 style="text-align:center; color:#2e7081">{{ 'Créer un Programme Omra' }}</h3>
                    </div>
                    <form action="{{ route('reservation_omras.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="main-user-info">
                            <div class="user-input-box">
                                <label for="nom">Nom Complet</label>
                                <input type="text" id="nom" name="nom" value="{{ old('nom') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="numero">Numéro Téléphone</label>
                                <input type="text" id="numero" name="numero" value="{{ old('numero') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="passeport">Passeport (Scanné)</label>
                                <input type="file" id="passeport" name="passeport" value="{{ old('passeport') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="photo">Photo (Scanné)</label>
                                <input type="file" id="photo" name="photo" value="{{ old('photo') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="age">Âge (Enfant)</label>
                                <input type="text" id="age" name="age" value="{{ old('age') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="group_name">Nom de Famille (Groupe)</label>
                                <input type="text" id="group_name" name="group_name" value="{{ old('group_name') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="hotel">Hotel</label>
                                <select id="hotel" name="hotel">
                                    @if($omra->hotels->isEmpty())
                                        <option disabled>Aucun hôtel associé à cette Omra.</option>
                                    @else
                                        <option value="">-- Sélectionnez un hôtel --</option>
                                        @foreach($omra->hotels as $hotel)
                                            <option value="{{ $hotel->nom }}" {{ old('hotel') == $hotel->nom ? 'selected' : '' }}>
                                                {{ $hotel->nom }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <input type="hidden" name="omraID" value="{{ $omra->id }}">
                            <div class="form-submit-btn">
                                <button type="submit">Créer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@isset($reservation_omra)
<!-- Popup Form Container -->
<div class="modal fade" id="editProgrammeOmraModal" tabindex="-1" role="dialog" aria-labelledby="editProgrammeOmraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <div class="modal-header">
                <h5 class="modal-title" id="editProgrammeOmraLabel">Modifier Client</h5>
            </div>
            <form id="editProgrammeOmraForm" method="POST" action="{{ route('reservation_omras.update', $reservation_omra->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="nom">Nom Complet</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $reservation_omra->nom) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="numero">Numéro</label>
                        <input type="text" name="numero" id="numero" value="{{ old('numero', $reservation_omra->numero) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="passeport">Passeport (Scanné)</label>
                        <input type="file" id="passeport" name="passeport">
                    </div>
                    <div class="user-input-box">
                        <label for="photo">Photo (Scanné)</label>
                        <input type="file" id="photo" name="photo">
                    </div>
                    <div class="user-input-box">
                        <label for="age">Âge (Enfant)</label>
                        <input type="text" id="age" name="age" value="{{ old('age', $reservation_omra->age) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="group_name">Nom de Famille (Groupe)</label>
                        <input type="text" id="group_name" name="group_name" value="{{ old('group_name', $reservation_omra->group_name) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="hotel">Hotel</label>
                        <select id="hotel" name="hotel">
                            @if($omra->hotels->isEmpty())
                                <option disabled>Aucun hôtel associé à cette Omra.</option>
                            @else
                                <option value="">-- Sélectionnez un hôtel --</option>
                                @foreach($omra->hotels as $hotel)
                                    <option value="{{ $hotel->nom }}" {{ old('hotel', $reservation_omra->hotel) == $hotel->nom ? 'selected' : '' }}>
                                        {{ $hotel->nom }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <input type="hidden" name="omraID" value="{{ $omra->id }}">
                    <div class="form-submit-btn">
                        <button type="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endisset



<script>
 document.getElementById('toggleFormBtn').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');

    // Check if the form is currently hidden
    if (formContainer.style.display === 'none' || formContainer.style.display === '') {
        formContainer.style.display = 'block';
        formContainer.style.maxHeight = formContainer.scrollHeight + "px";
    } else {
        formContainer.style.maxHeight = '0';
        setTimeout(function() {
            formContainer.style.display = 'none';
        }, 500); // Match this duration with the CSS transition duration
    }
});


document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById("editProgrammeOmraModal");
        var closeBtn = modal.querySelector(".close");
        const editButtons = document.querySelectorAll('.edit-button');
        const editForm = document.getElementById('editProgrammeOmraForm');

        editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const nom = this.getAttribute('data-nom');
            const numero = this.getAttribute('data-numero');
            const age = this.getAttribute('data-age');
            const hotel = this.getAttribute('data-hotel');
            const group_name = this.getAttribute('data-group_name');

            editForm.action = `/reservation_omras/${id}`;
            editForm.querySelector('#nom').value = nom || '';
            editForm.querySelector('#numero').value = numero || '';
            editForm.querySelector('#age').value = age || '';
            editForm.querySelector('#hotel').value = hotel || '';
            editForm.querySelector('#group_name').value = group_name || '';


                modal.style.display = "block";
            });
        });

        closeBtn.addEventListener('click', function() {
            modal.style.display = "none";
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });

        const searchInput = document.getElementById('hotel-search');
        const checkboxesContainer = document.querySelector('.hotel-checkboxes');
        const checkboxes = document.querySelectorAll('.hotel-checkboxes input[type="checkbox"]');

        searchInput.addEventListener('click', function() {
            checkboxesContainer.classList.toggle('show');
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedHotels = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.nextElementSibling.textContent.trim())
                    .join(', ');

                searchInput.value = selectedHotels;
            });
        });

        document.addEventListener('click', function(event) {
            if (!searchInput.contains(event.target) && !checkboxesContainer.contains(event.target)) {
                checkboxesContainer.classList.remove('show');
            }
        });
});
</script>
<script src="{{ asset('js/search.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('js/dash.js') }}"></script>
</body>
</html>
