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
                    Admin : {{ Auth::user()->name }}
                </li>
            </div>
            <div class="toggle-form-container">
                <button id="toggleFormBtn" class="toggle-form-btn">Lancer Omra</button>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1>Omra</h1>
                        <div class="input-group">
                            <input type="search" id="searchInput" placeholder="Search Data...">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                    </section>
                    <section class="table__body">
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Titre</th>
                                    <th>Vol</th>
                                    <th>Départ</th>
                                    <th>Retour</th>
                                    <th>NB Place</th>
                                    <th>Saison</th>
                                    <th>Compagne</th>
                                    <th>hotels</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($omras as $omra)
                                    <tr>
                                        <td><img src="{{asset('/storage/images/'.$omra->photo)}}" alt="Photo de l'Omra" style="width: 50px; height: 50px;"></td>
                                        <td>{{ $omra->nom }}</td>
                                        <td>{{ $omra->type }}</td>
                                        <td>{{ $omra->depart }}</td>
                                        <td>{{ $omra->retour }}</td>
                                        <td>{{ $omra->place }}</td>
                                        <td>{{ $omra->saison }}</td>
                                        <td>{{ $omra->compagne }}</td>
                                        <!-- Hôtels liés à l'Omra -->
                                        <td>
                                            @if($omra->hotels && count($omra->hotels) > 0)
                                                @foreach($omra->hotels as $hotel)
                                                    {{ $hotel->nom }}<br>
                                                @endforeach
                                            @else
                                                Aucun hôtel assigné
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="edit-button"
                                               data-id="{{ $omra->id }}"
                                               data-nom="{{ $omra->nom }}"
                                               data-type="{{ $omra->type }}"
                                               data-depart="{{ $omra->depart }}"
                                               data-retour="{{ $omra->retour }}"
                                               data-place="{{ $omra->place }}"
                                               data-saison="{{ $omra->saison }}"
                                               data-compagne="{{ $omra->compagne }}"
                                               data-photo="{{ $omra->photo }}"
                                               data-hotel-ids="{{ $omra->hotels ? implode(',', $omra->hotels->pluck('id')->toArray()) : '' }}">
                                               <span class="icon"><i class="fas fa-pencil"></i></span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('omras.destroy', $omra->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button">
                                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </main>
            </div>

            <div id="formContainer" class="form-container" style="display: none;">
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h3 style="text-align:center; color:#2e7081">{{ 'Ajouter Omra' }}</h3>
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
                    <form action="{{ route('omras.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="main-user-info">
                            <div class="user-input-box">
                                <label for="titre">Titre</label>
                                <input type="text" name="nom" id="titre" value="{{ old('nom') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="type">Vol</label>
                                <select id="type" name="type">
                                    <option value="Direct" {{ old('type') == 'Direct' ? 'selected' : '' }}>Direct</option>
                                    <option value="Indirect" {{ old('type') == 'Indirect' ? 'selected' : '' }}>Indirect</option>
                                </select>
                            </div>
                            <div class="user-input-box">
                                <label for="depart">Date Départ</label>
                                <input type="date" name="depart" id="depart" value="{{ old('depart') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="retour">Date Retour</label>
                                <input type="date" name="retour" id="retour" value="{{ old('retour') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="place">Nombre de Place</label>
                                <input type="number" name="place" id="place" value="{{ old('place') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="saison">Saison</label>
                                <input type="number" name="saison" id="saison" value="{{ old('saison') }}">
                            </div>
                            <div class="user-input-box">
                                <label for="compagne">Compagne</label>
                                <select id="compagne" name="compagne">
                                    <option value="SV" {{ old('compagne') == 'SV' ? 'selected' : '' }}>SV</option>
                                    <option value="AH" {{ old('compagne') == 'AH' ? 'selected' : '' }}>AH</option>
                                    <option value="TU" {{ old('compagne') == 'TU' ? 'selected' : '' }}>TU</option>
                                </select>
                            </div>
                            <div class="user-input-box">
                                <label for="hotels">hotels</label>
                                <input type="text" id="hotel-search" placeholder="Select hotels..." readonly>
                                <div class="hotel-checkboxes">
                                    <div id="hotels">
                                        @foreach($hotels as $hotel)
                                            <div>
                                                <input type="checkbox" name="hotels[]" value="{{ $hotel->id }}" id="hotel_{{ $hotel->id }}">
                                                <label for="hotel_{{ $hotel->id }}">{{ $hotel->nom }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="user-input-box">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="photo">
                            </div>
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

@isset($omra)
<!-- Popup Form Container -->
<div class="modal fade" id="editProgrammeOmraModal" tabindex="-1" role="dialog" aria-labelledby="editProgrammeOmraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <div class="modal-header">
                <h5 class="modal-title" id="editProgrammeOmraLabel">Modifier Omra</h5>
                
            </div>
            <form id="editProgrammeOmraForm" method="POST" action="{{ route('omras.update', $omra->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="nom">Titre</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $omra->nom) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="type">Vol</label>
                        <select id="type" name="type">
                            <option value="Direct" {{ old('type', $omra->type) == 'Direct' ? 'selected' : '' }}>Direct</option>
                            <option value="Indirect" {{ old('type', $omra->type) == 'Indirect' ? 'selected' : '' }}>Indirect</option>
                        </select>
                    </div>
                    <div class="user-input-box">
                        <label for="depart">Date Départ</label>
                        <input type="date" name="depart" id="depart" value="{{ old('depart', $omra->depart) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="retour">Date Retour</label>
                        <input type="date" name="retour" id="retour" value="{{ old('retour', $omra->retour) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="place">Nombre de Place</label>
                        <input type="number" name="place" id="place" value="{{ old('place', $omra->place) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="saison">Saison</label>
                        <input type="number" name="saison" id="saison" value="{{ old('saison', $omra->saison) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="compagne">Compagne</label>
                        <select id="compagne" name="compagne">
                            <option value="SV" {{ old('compagne', $omra->compagne) == 'SV' ? 'selected' : '' }}>SV</option>
                            <option value="AH" {{ old('compagne', $omra->compagne) == 'AH' ? 'selected' : '' }}>Ah</option>
                            <option value="TU" {{ old('compagne', $omra->compagne) == 'TU' ? 'selected' : '' }}>TU</option>
                        </select>
                    </div>
                    <div class="user-input-box">
                        <label for="editHotels">Hôtels</label>
                        <input type="text" id="hotel-search" placeholder="Select hotels..." readonly>
            
                        <div class="hotel-checkboxe" id="hotel-checkboxes-block">
                            <div id="editHotels">
                                @foreach($hotels as $hotel)
                                <div class="checkbox-dropdown">
                                        <input type="checkbox" name="hotels[]" value="{{ $hotel->id }}" id="hotel_{{ $hotel->id }}">
                                        <label for="hotel_{{ $hotel->id }}">{{ $hotel->nom }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="user-input-box">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo">
                        <input type="hidden" name="current_photo" id="current_photo">
                    </div>
                    <div class="form-submit-btn">
                        <button type="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endisset

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Toggle the hotel checkboxes block when clicking on the hotel search input
document.getElementById('hotel-search').addEventListener('click', function() {
        const checkboxesBlock = document.getElementById('hotel-checkboxes-block');
        if (checkboxesBlock.style.display === "none" || checkboxesBlock.style.display === "") {
            checkboxesBlock.style.display = "block";
        } else {
            checkboxesBlock.style.display = "none";
        }
    });
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
                const type = this.getAttribute('data-type');
                const depart = this.getAttribute('data-depart');
                const retour = this.getAttribute('data-retour');
                const place = this.getAttribute('data-place');
                const saison = this.getAttribute('data-saison');
                const compagne = this.getAttribute('data-compagne');
                const photo = this.getAttribute('data-photo');
                const hotelIds = this.getAttribute('data-hotel-ids') ? this.getAttribute('data-hotel-ids').split(',') : [];

                editForm.action = `/omras/${id}`;
                editForm.querySelector('#nom').value = nom || '';
                editForm.querySelector('#type').value = type || '';
                editForm.querySelector('#depart').value = depart || '';
                editForm.querySelector('#retour').value = retour || '';
                editForm.querySelector('#place').value = place || '';
                editForm.querySelector('#saison').value = saison || '';
                editForm.querySelector('#compagne').value = compagne || '';
                editForm.querySelector('#current_photo').value = photo || '';

                const hotelSelect = document.getElementById('editHotels');
                hotelSelect.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = hotelIds.includes(checkbox.value);
                });

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
</body>
</html>
