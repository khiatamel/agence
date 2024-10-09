<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/programmeOmra.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Sanhadja Voyage</title>
</head>
<body>
<div class="topbar">
    		<div class="toggle">
             <a href="{{ route('dash') }}"><ion-icon name="arrow-back-outline"></ion-icon></a>
    		</div>
    
    		<div class="user">
                <li class="navbar-item">
                    Admin : {{ Auth::user()->name }}     
                </li>
          </div>
    	</div>
<div class="container" >
<!-- Toasts -->
<div id="toast-success" class=" toast hidden flex items-center w-full max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>

<div id="toast-danger" class="toast hidden flex items-center w-full max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>

<div id="toast-warning" class="toast hidden flex items-center w-full max-w-xl p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
        </svg>
        <span class="sr-only">Warning icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ session('warning') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>

    <div class="main">
       

        <div class="details">
            <div class="recentOrders">
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1>Programmes</h1>
                        <div class="input-group">
                            <input type="search" id="searchInput" placeholder="Search Data...">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                        <div class="toggle-form-container">
                            <button id="toggleFormBtn" class="toggle-form-btn">Créer un Programme Omra</button>
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
                                            <button data-modal-target="popup-modal-{{ $programme_omra->id }}" data-modal-toggle="popup-modal-{{ $programme_omra->id }}" type="button" class="button ">
                                                <span class="icon text-red-600"><i class="fas fa-trash"></i></span>
                                            </button>

                                            <!-- Modal -->
                                            <div id="popup-modal-{{ $programme_omra->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $programme_omra->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                            </svg>
                                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Voulez-vous confirmer la suppression de cet programme ?</h3>

                                                            <a href="{{ route('programme_omras.destroy', $programme_omra->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $programme_omra->id }}').submit();">
                                                                <button id="confirm-delete" data-id="{{ $programme_omra->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Confirmer
                                                                </button>
                                                            </a>
                                                            <button data-modal-hide="popup-modal-{{ $programme_omra->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>

                                                            <form id="delete-form-{{ $programme_omra->id }}" action="{{ route('programme_omras.destroy', $programme_omra->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                <option value="AH" {{ old('compagne') == 'AH' ? 'selected' : '' }}>AH</option>
                <option value="TU" {{ old('compagne') == 'TU' ? 'selected' : '' }}>TU</option>
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

@isset($programme_omra)
<!-- Modal Structure -->
<div class="modal fade" id="editProgrammeOmraModal" tabindex="-1" role="dialog" aria-labelledby="editProgrammeOmraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <div class="modal-header">
                <h5 class="modal-title" id="editProgrammeOmraLabel">Modifier Omra</h5>
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
@endisset
<!-- Script -->
<script>
    function showToast(id) {
        const toast = document.getElementById(id);
        toast.classList.remove('hidden');
        
        // Masquer le toast après 3 secondes
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000);
    }

    @if(session('success'))
        showToast('toast-success');
    @endif

    @if(session('error'))
        showToast('toast-danger');
    @endif

    @if(session('warning'))
        showToast('toast-warning');
    @endif
</script>
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

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="{{ asset('js/search.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('js/dash.js') }}"></script>
</body>
</html>
