<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/ajouter.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Sanhadja Voyage</title>
</head>
<style>
        .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(56, 73, 85); /* Couleur de fond (à adapter selon ton thème) */
        padding: 10px 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Ombre pour un effet 3D */
        
    }

    /* Style de l'icône de menu */
    .toggle {
        font-size: 24px;
        color: white;
        cursor: pointer;
        transition: transform 0.3s ease; /* Effet de rotation au survol */
    }

    .toggle:hover {
        transform: rotate(360deg); /* Rotation sur survol */
    }

    /* Style du texte utilisateur */
    .user {
        display: flex;
        align-items: center;
        font-size: 18px;
        font-weight: 500;
        color: #fff; /* Couleur blanche pour contraster avec la barre */
    }

    .user li.navbar-item {
        list-style: none; /* Enlever les puces du <li> */
        margin-left: 10px; /* Un peu d'espace avant le texte */
    }

    .user li.navbar-item:before {
        content: '\f2bd'; /* Icône d'utilisateur de Font Awesome */
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        margin-right: 8px;
    }

    /* Effets de survol pour l'utilisateur */
    .user li.navbar-item:hover {
        color: #c1e1e6; /* Couleur légèrement plus claire au survol */
        text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.3); /* Effet d'ombre subtile */
    }

    /* Media queries pour une meilleure réactivité */
    @media (max-width: 768px) {
        .topbar {
            flex-direction: column; /* Empiler les éléments en mobile */
            align-items: flex-start;
        }

        .user {
            margin-top: 10px;
        }
    }
        /* Style de la boîte de recherche */
    .hotel-search {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Masquer la liste des hôtels par défaut */
    .hotel-checkboxe {
        display: none;
        opacity: 0;
        max-height: 0;
        transition: all 0.3s ease-in-out;
        overflow-y: auto;
        border: 1px solid #ccc;
        background-color: #fff;
        position: absolute;
        width: 100%;
        max-height: 200px; /* Hauteur maximale avec défilement si trop d'éléments */
        z-index: 1000;
    }

    /* Animation lors du focus sur le champ de recherche */
    .hotel-search:focus + .hotel-checkboxe {
        display: block;
        opacity: 1;
        max-height: 200px; /* On dévoile la hauteur maximale */
        transition: all 0.3s ease-in-out;
    }

    /* Style pour les items des hôtels */
    .hotel-item {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .hotel-item label {
        margin-left: 8px;
        font-size: 16px;
    }

    /* Style scrollbar si nécessaire */
    .hotel-checkboxe::-webkit-scrollbar {
        width: 6px;
    }

    .hotel-checkboxe::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
    /* Affiche la liste au survol */
    .user-input-box:hover .hotel-checkboxe {
        display: block;
        opacity: 1;
        max-height: 200px;
    }

    /* Style du conteneur principal */
    .user-input-box {
        position: relative;
        margin-bottom: 5px;
        width: 100%;
        max-width: 400px;
        font-family: Arial, sans-serif;
    }

    /* Style pour le label */
    .user-input-box label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 14px;
        color: #333;
    }

    /* Style pour le champ de recherche */
    .user-input-box input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
        cursor: pointer; /* Pour indiquer que c'est cliquable */
        transition: border 0.3s ease;
    }

    /* Changement de l'apparence à l'état focus */
    .user-input-box input[type="text"]:focus {
        border-color: #3498db;
        cursor: text;
    }

    /* Conteneur des cases à cocher */
    .hotel-checkboxes {
        margin-top: 10px;
        max-height: 200px; /* Limite la hauteur et rend la zone défilable */
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        display: none; /* Masqué par défaut */
    }

    /* Style des cases à cocher */
    .hotel-checkboxes div {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }

    .hotel-checkboxes input[type="checkbox"] {
        margin-right: 10px;
        cursor: pointer;
    }

    .hotel-checkboxes label {
        font-size: 14px;
        cursor: pointer;
    }

    /* Option d'affichage dynamique */
    .hotel-checkboxes.show {
        display: block;
    }

    /* Style pour la barre de recherche avec la saisie autorisée */
    #hotel-search {
        cursor: text; /* Permet de saisir du texte */
    }

    /* Style pour chaque hôtel */
    .hotel-item {
        display: flex;
        align-items: center;
        padding: 8px 0;
    }

    .hotel-item input[type="checkbox"] {
        margin-right: 12px;
    }

    .hotel-item label {
        font-size: 14px;
        color: #666;
    }

    /* Style pour les barres de défilement */
    .hotel-checkboxes::-webkit-scrollbar {
        width: 8px;
    }

    .hotel-checkboxes::-webkit-scrollbar-thumb {
        background-color: #3498db;
        border-radius: 10px;
    }


    .hotel-item {
        display: flex;
        align-items: center;
        margin: 5px 0;
    }

    .hotel-item input[type="checkbox"] {
        margin-right: 10px;
    }

</style>
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
<div class="container items-center" >
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
                        <h1>Omra</h1>
                        <div class="input-group">
                            <input type="search" placeholder="Rechercher...">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                        <div class="toggle-form-container">
                            <button id="toggleFormBtn" class="toggle-form-btn">Lancer Omra</button>
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
                                    <th>commission</th>
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
                                                {{-- Définir un message d'erreur lorsque aucun hôtel n'est trouvé --}}
                                                @if(!session('error')) <!-- Vérifiez que le message d'erreur n'est pas déjà défini -->
                                                    {{ session()->flash('error', 'Aucun hôtel assigné'); }}
                                                @endif
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
                                            <button data-modal-target="popup-modal-{{ $omra->id }}" data-modal-toggle="popup-modal-{{ $omra->id }}" type="button" class="button ">
                                                <span class="icon text-red-600"><i class="fas fa-trash"></i></span>
                                            </button>

                                            <!-- Modal -->
                                            <div id="popup-modal-{{ $omra->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $omra->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                            </svg>
                                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Voulez-vous confirmer la suppression de cette Omra ?</h3>

                                                            <a href="{{ route('omras.destroy', $omra->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $omra->id }}').submit();">
                                                                <button id="confirm-delete" data-id="{{ $omra->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Confirmer
                                                                </button>
                                                            </a>
                                                            <button data-modal-hide="popup-modal-{{ $omra->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>

                                                            <form id="delete-form-{{ $omra->id }}" action="{{ route('omras.destroy', $omra->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <a  href="{{ route('commissions.createForOmra', ['id' => $omra->id]) }}">
                                                <span class="icon" style="color: green;">
                                                    <i class="fas fa-handshake" aria-hidden="true"></i>
                                                </span>
                                            </a>                                       
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
                
                    <ul>
                                @foreach ($errors->all() as $error)
                            <div id="toast-danger" class="toast  flex items-center w-full max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{$error}}</div>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            </div>
                                @endforeach
                            </ul>
                        
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
                                <label for="hotels">Hôtels</label>
                                <input type="text" id="hotel-search" placeholder="Select hotels...">

                                <div class="hotel-checkboxes">
                                    <div id="hotels">
                                        @foreach($hotels as $hotel)
                                            <div >
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
                        <!-- Suppression de 'readonly' pour permettre la saisie -->
                        <input type="text" id="hotel-search" placeholder="Search hotels..." autocomplete="off">

                        <div class="hotel-checkboxe" id="hotel-checkboxes-block" >
                            <div id="editHotels">
                                @foreach($hotels as $hotel)
                                <div class="hotel-item">
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
<script src="{{ asset('js/dash.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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

$(document).ready(function() {
        @if(session('success'))
            toastr.success("{{ session('success') }}", "Succès");
        @endif
        
        @if(session('error'))
            toastr.error("{{ session('error') }}", "Erreur");
        @endif
    });

const searchInput = document.querySelector('.input-group input');
const tableRows = document.querySelectorAll('#dataTable tbody tr');

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

</body>
</html>
