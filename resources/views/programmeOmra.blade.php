<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/programmeOmra.css') }}">
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
                <button id="toggleFormBtn" class="toggle-form-btn">Créer un Programme Omra</button>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1>Programmes</h1>
                        <div class="input-group">
                            <input type="search" id="searchInput" placeholder="Search Data...">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                    </section>
                    <section class="table__body">
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th colspan="4">Phase Aller</th>
                                    <th colspan="4">Phase Retour</th>
                                    <th rowspan="2">Compagne</th>
                                    <th rowspan="2">Modifier</th>
                                    <th rowspan="2">Supprimer</th>
                                    <th rowspan="2">Status</th>
                                </tr>
                                <tr>
                                    <th>Date Aller</th>
                                    <th>N° Vol</th>
                                    <th>Parcours</th>
                                    <th>ETD</th>
                                    <th>Date Retour</th>
                                    <th>N° Vol</th>
                                    <th>Parcours</th>
                                    <th>ETD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programme_omras as $programme_omra)
                                    <tr>
                                        <td>{{ $programme_omra->départ }}</td>
                                        <td>{{ $programme_omra->nvD }}</td>
                                        <td>{{ $programme_omra->parcourtD }}</td>
                                        <td>{{ $programme_omra->heurD }}</td>
                                        <td>{{ $programme_omra->retour }}</td>
                                        <td>{{ $programme_omra->nvR }}</td>
                                        <td>{{ $programme_omra->parcourtR }}</td>
                                        <td>{{ $programme_omra->heurR }}</td>
                                        <td>{{ $programme_omra->compagne }}</td>
                                        <td>
                                          <a href="#" class="edit-button" 
                                            data-id="{{ $programme_omra->id }}" 
                                            data-départ="{{ $programme_omra->départ }}" 
                                            data-retour="{{ $programme_omra->retour }}"
                                            data-heurD="{{ $programme_omra->heurD }}" 
                                            data-heurR="{{ $programme_omra->heurR }}"
                                            data-nvD="{{ $programme_omra->nvD }}" 
                                            data-nvR="{{ $programme_omra->nvR }}"
                                            data-parcourtD="{{ $programme_omra->parcourtD }}" 
                                            data-parcourtR="{{ $programme_omra->parcourtR }}"
                                            data-compagne="{{ $programme_omra->compagne }}">
                                            <span class="icon"><i class="fas fa-pencil"></i></span>
                                          </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('programme_omras.destroy', $programme_omra->id) }}" method="POST" onsubmit="return confirm('vous ètes sûr?');" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button"><span class="icon"><i class="fas fa-trash"></i></span></button>
                                            </form>
                                        </td>
                                        <td>

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
                        <h3 style="text-align:center; color:#2e7081">{{ 'Créer un Programme Omra' }}</h3>
                    </div>
<form action="{{ route('programme_omras.store') }}" method="POST">
    @csrf
    <div class="main-user-info">
        <div class="user-input-box">
            <label for="départ">Date Départ</label>
            <input type="date" id="départ" name="départ" value="{{ old('départ') }}">
        </div>
        <div class="user-input-box">
            <label for="retour">Date Retour</label>
            <input type="date" id="retour" name="retour" value="{{ old('retour') }}">
        </div>
        <div class="user-input-box">
            <label for="heurD">ETD (Départ)</label>
            <input type="time" id="heurD" name="heurD" value="{{ old('heurD') }}">
        </div>
        <div class="user-input-box">
            <label for="heurR">ETD (Retour)</label>
            <input type="time" id="heurR" name="heurR" value="{{ old('heurR') }}">
        </div>
        <div class="user-input-box">
            <label for="nvD">N° Vol (Départ)</label>
            <input type="text" id="nvD" name="nvD" value="{{ old('nvD') }}">
        </div>
        <div class="user-input-box">
            <label for="nvR">N° Vol (Retour)</label>
            <input type="text" id="nvR" name="nvR" value="{{ old('nvR') }}">
        </div>
        <div class="user-input-box">
            <label for="parcourtD">Parcours (Départ)</label>
            <select id="parcourtD" name="parcourtD">
                <option value="Oran/Jeddah" {{ old('parcourtD') == 'Oran/Jeddah' ? 'selected' : '' }}>Oran/Jeddah</option>
                <option value="Oran/Medina" {{ old('parcourtD') == 'Oran/Medina' ? 'selected' : '' }}>Oran/Medina</option>
            </select>
        </div>
        <div class="user-input-box">
            <label for="parcourtR">Parcours (Retour)</label>
            <select id="parcourtR" name="parcourtR">
                <option value="Jeddah/Oran" {{ old('parcourtR') == 'Jeddah/Oran' ? 'selected' : '' }}>Jeddah/Oran</option>
                <option value="Medina/Oran" {{ old('parcourtR') == 'Medina/Oran' ? 'selected' : '' }}>Medina/Oran</option>
            </select>
        </div>
        <div class="user-input-box">
            <label for="compagne">Compagne</label>
            <select id="compagne" name="compagne">
                <option value="SV" {{ old('compagne') == 'SV' ? 'selected' : '' }}>SV</option>
                <option value="AH" {{ old('compagne') == 'AH' ? 'selected' : '' }}>RH</option>
                <option value="TU" {{ old('compagne') == 'TU' ? 'selected' : '' }}>RH</option>
            </select>
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

 
<!-- Modal Structure -->
<div class="modal fade" id="editProgrammeOmraModal" tabindex="-1" role="dialog" aria-labelledby="editProgrammeOmraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProgrammeOmraLabel">Modifier Omra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editProgrammeOmraForm" method="POST" action="{{ route('programme_omras.update', $programme_omra->id) }}">
                @csrf
                @method('PUT')
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="départ">Date Départ</label>
                        <input type="date" id="départ" name="départ" value="{{ old('départ', $programme_omra->départ) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="retour">Date Retour</label>
                        <input type="date" id="retour" name="retour" value="{{ old('retour', $programme_omra->retour) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="heurD">ETD (Départ)</label>
                        <input type="time" id="heurD" name="heurD" value="{{ old('heurD', $programme_omra->heurD) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="heurR">ETD (Retour)</label>
                        <input type="time" id="heurR" name="heurR" value="{{ old('heurR', $programme_omra->heurR) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="nvD">N° Vol (Départ)</label>
                        <input type="text" id="nvD" name="nvD" value="{{ old('nvD', $programme_omra->nvD) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="nvR">N° Vol (Retour)</label>
                        <input type="text" id="nvR" name="nvR" value="{{ old('nvR', $programme_omra->nvR) }}">
                    </div>
                    <div class="user-input-box">
                        <label for="parcourtD">Parcours (Départ)</label>
                        <select id="parcourtD" name="parcourtD">
                            <option value="Oran/Jeddah" {{ old('parcourtD', $programme_omra->parcourtD) == 'Oran/Jeddah' ? 'selected' : '' }}>Oran/Jeddah</option>
                            <option value="Oran/Medina" {{ old('parcourtD', $programme_omra->parcourtD) == 'Oran/Medina' ? 'selected' : '' }}>Oran/Medina</option>
                        </select>
                    </div>
                    <div class="user-input-box">
                        <label for="parcourtR">Parcours (Retour)</label>
                        <select id="parcourtR" name="parcourtR">
                            <option value="Jeddah/Oran" {{ old('parcourtR', $programme_omra->parcourtR) == 'Jeddah/Oran' ? 'selected' : '' }}>Jeddah/Oran</option>
                            <option value="Medina/Oran" {{ old('parcourtR', $programme_omra->parcourtR) == 'Medina/Oran' ? 'selected' : '' }}>Medina/Oran</option>
                        </select>
                    </div>
                    <div class="user-input-box">
                        <label for="compagne">Compagne</label>
                        <select id="compagne" name="compagne">
                            <option value="SV" {{ old('compagne', $programme_omra->compagne) == 'SV' ? 'selected' : '' }}>SV</option>
                            <option value="AH" {{ old('compagne', $programme_omra->compagne) == 'AH' ? 'selected' : '' }}>Ah</option>
                            <option value="TU" {{ old('compagne', $programme_omra->compagne) == 'TU' ? 'selected' : '' }}>TU</option>
                        </select>
                    </div>
                    <div class="form-submit-btn">
                        <button type="submit">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
    var closeBtn = document.querySelector(".close");
    const editButtons = document.querySelectorAll('.edit-button');
    const editForm = document.getElementById('editProgrammeOmraForm');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = button.getAttribute('data-id');
            const départ = button.getAttribute('data-départ');
            const retour = button.getAttribute('data-retour');
            const heurD = button.getAttribute('data-heurD');
            const heurR = button.getAttribute('data-heurR');
            const nvD = button.getAttribute('data-nvD');
            const nvR = button.getAttribute('data-nvR');
            const parcourtD = button.getAttribute('data-parcourtD');
            const parcourtR = button.getAttribute('data-parcourtR');
            const compagne = button.getAttribute('data-compagne');

            // Remplir les champs du formulaire dans le modal
            editForm.action = `/programme_omras/${id}`;
            editForm.querySelector('#départ').value = départ || '';
            editForm.querySelector('#retour').value = retour || '';
            editForm.querySelector('#heurD').value = heurD || '';
            editForm.querySelector('#heurR').value = heurR || '';
            editForm.querySelector('#nvD').value = nvD || '';
            editForm.querySelector('#nvR').value = nvR || '';
            editForm.querySelector('#parcourtD').value = parcourtD || '';
            editForm.querySelector('#parcourtR').value = parcourtR || '';
            editForm.querySelector('#compagne').value = compagne || '';
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

</script>
<script src="{{ asset('js/search.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('js/dash.js') }}"></script>
</body>
</html>
