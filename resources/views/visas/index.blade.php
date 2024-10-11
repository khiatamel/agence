<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/visaa.css') }}">
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
<div class="container">
    <h1>Liste des Visas</h1>
    <section class="table__header">
        
        <div class="input-group">
            <input type="search" placeholder="Rechercher...">
            <ion-icon name="search-outline"></ion-icon>
        </div>
        <div class="toggle-form-container">
            <a href="{{ route('visas.create') }}" class="toggle-form-btn">Ajouter un nouveau Visa</a>
        </div>
    </section>
   

    <div class="visa-container">
        @foreach($visas as $visa)
            <div class="visa-card" id="dataTable">
                <h2>Déstination : {{ $visa->destination }}</h2>

                <!-- Le bouton pour afficher/cacher les détails -->
                <div class="inline-flex rounded-md shadow-sm" role="group">
                      <!-- Premier bouton "Plus" -->
                      <button onclick="toggleDetails('details-{{ $visa->id }}', this)" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                      <i class="fa fa-plus-circle" style="margin-right: 10px;" aria-hidden="true"></i>
                      <span class="toggle-text">Plus</span> <!-- Texte modifiable -->
                      </button>
                    
                      <!-- Deuxième bouton "Modifier" -->
                      <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                      <i class="fa fa-pencil" style="margin-right: 10px;" aria-hidden="true"></i>
                        <a href="{{ route('visas.edit', $visa->id) }}">Modifier</a>
                      </button>
                    
                      <!-- Troisième bouton "Downloads" -->
                      <button data-modal-target="popup-modal-{{ $visa->id }}" data-modal-toggle="popup-modal-{{ $visa->id }}" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                      <i class="fa fa-trash" style="margin-right: 10px;" aria-hidden="true"></i>
                        Supprimer
                      </button>
                    </div>

                                            

                    <!-- Détails du visa -->
                    <div id="details-{{ $visa->id }}" class="details" style="display: none;">
                        <ul>
                            @foreach($visa->typeVisas as $typeVisa)
                                <li>
                                    <strong>Type Visa: </strong>{{ $typeVisa->type }}
                                    <ul>
                                        @foreach($typeVisa->dossierVisas as $dossierVisa)
                                            <li>{{ $dossierVisa->dossier }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
<!-- Modal -->
<div id="popup-modal-{{ $visa->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $visa->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                            </svg>
                                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Voulez-vous confirmer la suppression de cet visa ?</h3>

                                                            <a href="{{ route('visas.destroy', $visa->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $visa->id }}').submit();">
                                                                <button id="confirm-delete" data-id="{{ $visa->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Confirmer
                                                                </button>
                                                            </a>
                                                            <button data-modal-hide="popup-modal-{{ $visa->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>

                                                            <form id="delete-form-{{ $visa->id }}" action="{{ route('visas.destroy', $visa->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        @endforeach
        
    </div>
</div>


<script>
    function toggleDetails(detailId, button) {
    const details = document.getElementById(detailId);
    const icon = button.querySelector('i'); // Sélectionner l'icône dans le bouton

    if (details.style.display === "none" || details.style.display === "") {
        details.style.display = "block"; // Afficher les détails
        icon.classList.remove("fa-plus-circle"); // Enlever l'icône "Plus"
        icon.classList.add("fa-minus-circle"); // Ajouter l'icône "Moins"
        button.querySelector('.toggle-text').textContent = "Moins"; // Change le texte en "Moins"
    } else {
        details.style.display = "none"; // Cacher les détails
        icon.classList.remove("fa-minus-circle"); // Enlever l'icône "Moins"
        icon.classList.add("fa-plus-circle"); // Ajouter l'icône "Plus"
        button.querySelector('.toggle-text').textContent = "Plus"; // Change le texte en "Plus"
    }
}
</script>

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


    const searchInput = document.querySelector('.input-group input');
const tableRows = document.querySelectorAll('#dataTable ');

// Ajouter un événement d'écoute pour l'entrée de recherche
searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase().trim(); // Valeur de recherche en minuscules et sans espaces inutiles

    tableRows.forEach((row, i) => {
        const rowData = row.textContent.toLowerCase(); // Texte du contenu de la ligne
        const matchesSearch = rowData.includes(searchTerm); // Comparaison de la recherche

        // Afficher ou masquer la ligne en fonction de la recherche
        row.style.display = matchesSearch ? '' : 'none';

        // Appliquer une couleur de fond alternée pour les lignes visibles uniquement
        if (matchesSearch) {
            row.style.backgroundColor = (i % 2 === 0) ? 'transparent' : '#f9f9f9';
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body></html>