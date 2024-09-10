<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/programmeOmra.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
                                    <th>Compagnie</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($omras as $omra)
                                    <tr>
                                        <td><img src="{{ asset('storage/'.$omra->photo) }}" alt="Photo de l'Omra" style="width: 50px; height: 50px;"></td>
                                        <td>{{ $omra->nom }}</td>
                                        <td>{{ $omra->type }}</td>
                                        <td>{{ $omra->depart }}</td>
                                        <td>{{ $omra->retour }}</td>
                                        <td>{{ $omra->place }}</td>
                                        <td>{{ $omra->saison }}</td>
                                        <td>{{ $omra->compagne }}</td>
                                        <td>
                                            <a href="#" class="edit-button"
                                               data-id="{{ $omra->id }}"
                                               data-nom="{{ $omra->nom }}"
                                               data-depart="{{ $omra->depart }}"
                                               data-retour="{{ $omra->retour }}"
                                               data-place="{{ $omra->place }}"
                                               data-saison="{{ $omra->saison }}"
                                               data-compagne="{{ $omra->compagne }}">
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

<!-- Popup Form Container -->
<div class="modal fade" id="editProgrammeOmraModal" tabindex="-1" role="dialog" aria-labelledby="editProgrammeOmraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProgrammeOmraLabel">Modifier Omra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editProgrammeOmraForm" method="POST" action="{{ route('omras.update', $omra->id) }}">
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
                    <div class="form-submit-btn">
                        <button type="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
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

    $(document).ready(function () {
        $('.edit-button').on('click', function () {
            var id = $(this).data('id');
            var nom = $(this).data('nom');
            var depart = $(this).data('depart');
            var retour = $(this).data('retour');
            var place = $(this).data('place');
            var saison = $(this).data('saison');
            var compagne = $(this).data('compagne');

            $('#nom').val(nom);
            $('#depart').val(depart);
            $('#retour').val(retour);
            $('#place').val(place);
            $('#saison').val(saison);
            $('#compagne').val(compagne);

            $('#editProgrammeOmraForm').attr('action', '/omras/' + id);

            $('#editProgrammeOmraModal').modal('show');
        });
    });
</script>
</body>
</html>
