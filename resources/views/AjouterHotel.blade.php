<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    

    
    <title>Sanhadja Voyage</title>
</head>

<body>

<div class="container">
	<div class="navigation">
			<ul >
                <div>
				    <img style="width:150px; height:80px; margin-top:-5px;margin-left:0px;" src="../images/logoA.png" >
                </div>
                <li >
				<a href="{{ route('dash') }}" >
					<span class="icon"><img src="images/kaaba.png" style="width:20px;"></span>
					<span class="title">Omra</span>
				</a>
		</li>

        <li>
				<a href="{{ route('calender') }}" >
					<span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
					<span class="title">calendrier</span>
				</a>
		</li>
        <li class="activ">
				<a href="{{route('hotels.index') }}">
					<span class="icon"><ion-icon name="business-outline"></ion-icon></span>
					<span class="title">Hotels</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="people-outline"></ion-icon></span>
					<span class="title">Omra</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
					<span class="title">Voyage Organisé</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="help-circle-outline"></ion-icon></span>
					<span class="title">Visa</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
					<span class="title">Assurance</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<span class="title">billet</span>
				</a>
		</li>
	    <li>
				<a href="{{ route('logout') }}" class="navbar-link logout-link" 
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
					<span class="title">Sign Out</span>
				</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
		</li>

		</ul>
	</div>

    <div class="main">
    	<div class="topbar " >
    		<div class="toggle">
    			<ion-icon name="menu-outline"></ion-icon>
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

        <div class="detail">
            <div class="recentOrders">
                <main class="table" id="customers_table">
                    <section class="table__header">

                        <h1>Hotels</h1>
                        <div class="input-group">
                            <input type="search" id="searchInput" placeholder="Search Data...">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                        <div class="toggle-form-container">
                <button id="toggleFormBtn" class="toggle-form-btn" onclick="window.location.href='{{ url('hotels/create')}}'">Ajouter Hotel</button>
            </div>
                    </section>
                    <section class="table__body">
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Description</th>
                                    <th>Détail</th>
                                    <th>Modifier</th>
                                    <th>supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->nom }}</td>
                                    <td>{{ $hotel->adresse }}</td>
                                    <td>{{ $hotel->desc }}</td>
                                    <td>
                                        <a href="{{ route('hotels.show', $hotel->id) }}"><span class="icon"><i class="fas fa-eye"></i></span></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hotels.edit', $hotel->id) }}"><span class="icon"><i class="fas fa-pencil"></i></span></a>
                                    </td>    
                                    <td>
                                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr?');">
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
        </div>
    </div>
</div>


<!-- Scripts -->
 <script>
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

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

 <!-- Inclusion du fichier JavaScript -->
 <script src="{{ asset('js/dash.js') }}"></script>
</body>
</html>
