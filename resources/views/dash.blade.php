<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}"/>
    
    <title>Sanhadja Voyage</title>
</head>

<body>

<div class="container">
	<div class="navigation">
			<ul>
                <div class='img'>
				<img style="width:150px; height:80px; margin-top:-5px;margin-left:0px;" src="../images/logoA.png" >
                </div>
                <li class="activ">
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
        <li>
				<a href="{{route('hotels.index') }}">
					<span class="icon"><ion-icon name="business-outline"></ion-icon></span>
					<span class="title">Hotels</span>
				</a>
		</li>

		<li>
				<a href="{{route('admin.reservation.index') }}">
					<span class="icon"><ion-icon name="logo-vimeo"></ion-icon></span>
					<span class="title">Visa</span>
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
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="omra-management-buttons">
                <a href="{{ route('programme_omras.index') }}" class="topbar-btn">
                    <ion-icon name="document-text-outline"></ion-icon>
                    <span>Programmes</span>
                </a>
                <a href="{{route('omra.index')}}" class="topbar-btn">
                    <ion-icon name="pricetag-outline"></ion-icon>
                    <span>Offres</span>
                </a>
                <a href="" class="topbar-btn">
                    <ion-icon name="people-outline"></ion-icon>
                    <span>Clients</span>
                </a>
            </div>
            <div class="user">
                <li class="navbar-item">
                    Admin : {{ Auth::user()->name }}     
                </li>
        </div>
        </div>

        <div class="details">
            <!-- Div to display Omra details when clicked -->
            <div class="recentOrders" id="omraDetails" >
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1>Les demandes</h1>
                        <div class="input-group">
                            <input type="search" placeholder="Search Data...">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('reservation_omras.inde') }}">
                            <select name="role" id="role">
                                <option value="all">All</option>
                                <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="client" {{ request('role') === 'client' ? 'selected' : '' }}>Client</option>
                                <option value="agence" {{ request('role') === 'agence' ? 'selected' : '' }}>Agence</option>
                            </select>
                            <!-- Champ caché pour l'Omra sélectionnée -->
                            <input type="hidden" name="selected_omra" value="{{ request('selected_omra') }}">
                            <button type="submit">Filter</button>
                        </form>
                    </section>

                    <section class="table__body">
                        <table>
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom Complet</th>
                                    <th>Numéro Téléphone</th>
                                    <th>PassePort</th>
                                    <th>Photo</th>
                                    <th id="trier">Hotel <span class="icon-arrow">&UpArrow;</span></th>
                                    <th>Age (Enfant)</th>
                                    <th id="trier">Groupe <span class="icon-arrow">&UpArrow;</span></th>
                                    <th id="trier"> Statut <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody id="omraDetailsTableBody">
                                <!-- Dynamically filled -->
                                @php $index = 1; @endphp
                                @foreach($reservation_omras as $reservation_omra)
                                <tr>
                                    <td>{{ $index++ }}</td>
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
                                        <td style="color: orange;">{{ $reservation_omra->statut }}</td>
                                    @endif
                                    <td>
                                        <!-- Accepter -->
                                        <a href="{{ route('dash.accept', ['id' => $reservation_omra->id, 'selected_omra' => request('selected_omra')]) }}" style="color:green" class="icon-btn-A" title="Accepter">
                                            <i class="fas fa-check-circle text-success"></i>
                                        </a>
                                    
                                            <!-- Refuser -->
                                        <a href="{{ route('dash.refuse', ['id' => $reservation_omra->id, 'selected_omra' => request('selected_omra')]) }}" style="color:red" class="icon-btn-R" title="Refuser">
                                            <i class="fas fa-times-circle text-danger"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                        
                            </tbody>
                        </table>
                    </section>
                </main>
            </div>

            <!-- Table with Omras -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Omra</h2>
                </div>
                <div class="input">
                        <input type="search" placeholder="Search Data...">
                        <ion-icon name="search-outline"></ion-icon>
                </div>
                <table id="omraTable">
                    @foreach($omras as $omra)
                    <tr class="omra-row" data-id="{{ $omra->id }}" data-nom="{{ $omra->nom }}" data-compagne="{{ $omra->compagne }}">
                        <td width="60px">
                            <div class="imgBox">
                                <img src="{{ asset('/storage/images/'.$omra->photo) }}" alt="">
                            </div>
                        </td>
                        <td>
                            <h4>{{ $omra->nom }}</h4><span>{{ $omra->compagne }}</span>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectedOmraId = new URLSearchParams(window.location.search).get('selected_omra');
    if (selectedOmraId) {
        // Marquer la ligne de l'Omra sélectionnée
        const selectedRow = document.querySelector(`.omra-row[data-id="${selectedOmraId}"]`);
        if (selectedRow) {
            selectedRow.classList.add('selected');
            selectedRow.scrollIntoView(); // Faire défiler jusqu'à l'Omra sélectionnée
        }
    }

    // Gérer le clic sur une ligne d'Omra pour enregistrer l'ID dans l'URL
    document.querySelectorAll('.omra-row').forEach(function(row) {
        row.addEventListener('click', function() {
            const selectedOmraId = this.getAttribute('data-id');

            // Mettre à jour les actions pour inclure l'ID de l'Omra sélectionnée
            const actionLinks = document.querySelectorAll('a[href*="dash"]');
            actionLinks.forEach(function(link) {
                const url = new URL(link.href);
                url.searchParams.set('selected_omra', selectedOmraId);
                link.href = url.toString();
            });

            // Mettre à jour le champ caché du formulaire de filtre
            const filterForm = document.querySelector('form[action*="reservation_omras"]');
            if (filterForm) {
                filterForm.querySelector('input[name="selected_omra"]').value = selectedOmraId;
            }

            // Ajouter une classe pour mettre en évidence la ligne sélectionnée
            document.querySelectorAll('.omra-row').forEach(function(r) {
                r.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        const rows = document.querySelectorAll('#omraTable .omra-row');
        console.log(`Found ${rows.length} rows`);
        rows.forEach(row => {
            row.addEventListener('click', function() {
                const omraId = this.getAttribute('data-id');
                console.log('Row clicked, omraId:', omraId);

            const detailsDiv = document.getElementById('omraDetails');
            detailsDiv.style.display = 'block';  // Afficher le div des détails

            let index = 1;
            const tableBody = document.getElementById('omraDetailsTableBody');
            tableBody.innerHTML = ''; // Effacer le contenu précédent

            // Récupérer les données via AJAX
            fetch(`/reservation_omra/${omraId}/details`)
    .then(response => response.json())
    .then(data => {
        // Vérifie que des données ont été récupérées
        if (data.length > 0) {
            data.forEach(reservation => {
                tableBody.innerHTML += `
                    <tr>
                        <td>${index++}</td>
                        <td>${reservation.nom}</td>
                        <td>${reservation.numero}</td>
                        <td><a href="${reservation.passeport_url}" target="_blank">Voir le Passeport</a></td>
                        <td><a href="${reservation.photo_url}" target="_blank">Voir la Photo</a></td>
                        <td>${reservation.hotel}</td>
                        <td>${reservation.age}</td>
                        <td>${reservation.group_name}</td>
                        <td style="color: ${getStatusColor(reservation.statut)};">${reservation.statut}</td>
                        <td>
                            <a href="/dash/accept/${reservation.id}" class="icon-btn-A" title="Accepter">
                                <i class="fas fa-check-circle text-success"></i>
                            </a>
                            <a href="/dash/refuse/${reservation.id}" class="icon-btn-R" title="Refuser">
                                <i class="fas fa-times-circle text-danger"></i>
                            </a>
                        </td>
                    </tr>
                `;
            });
        } else {
            tableBody.innerHTML = `<tr><td colspan="8">Aucune réservation trouvée.</td></tr>`;
        }
    })
    .catch(error => console.error('Error fetching Omra details:', error));

        });
    });
    }, 100);
});

// Fonction pour obtenir la couleur du statut
function getStatusColor(status) {
    switch (status) {
        case 'accepté':
            return 'green';
        case 'en cours de traitement':
            return 'orange';
        case 'refusé':
            return 'red';
        default:
            return 'black'; // Couleur par défaut
    }
}


document.querySelectorAll('.user-filter').forEach(filter => {
    filter.addEventListener('click', function(event) {
        event.preventDefault();
        const role = this.getAttribute('data-role');
        
        fetch(`/reservations/filter/${role}`)
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#customers_table tbody');
                tbody.innerHTML = '';

                let index = 1;
                data.reservations.forEach(reservation => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${ index++ }</td>
                            <td>${reservation.nom}</td>
                            <td>${reservation.numero}</td>
                            <td><a href="/storage/${reservation.passeport}" target="_blank">Voir le Passeport</a></td>
                            <td><a href="/storage/${reservation.photo}" target="_blank">Voir la Photo</a></td>
                            <td>${reservation.hotel}</td>
                            <td>${reservation.age}</td>
                            <td>${reservation.group_name}</td>
                            <td style="color: ${reservation.statut === 'accepté' ? 'green' : reservation.statut === 'refusé' ? 'red' : 'blue'};">
                                ${reservation.statut}
                            </td>
                            <td>
                                <a href="/dash/accept/${reservation.id}" class="icon-btn-A" title="Accepter">
                                    <i class="fas fa-check-circle text-success"></i>
                                </a>
                                <a href="/dash/refuse/${reservation.id}" class="icon-btn-R" title="Refuser">
                                    <i class="fas fa-times-circle text-danger"></i>
                                </a>
                            </td>
                        </tr>`;
                });
            });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // Select all headers with the id 'trier'
    const headers = document.querySelectorAll('#trier');

    headers.forEach(header => {
        header.addEventListener('click', () => {
            const table = header.closest('table');
            const index = Array.from(header.parentNode.children).indexOf(header);
            const rows = Array.from(table.querySelectorAll('tbody tr'));
            const isAscending = header.classList.contains('asc');
            const sortDirection = isAscending ? 'desc' : 'asc';

            rows.sort((a, b) => {
                const aText = a.children[index].textContent.trim();
                const bText = b.children[index].textContent.trim();

                // Sort numbers and strings differently
                if (!isNaN(aText) && !isNaN(bText)) {
                    return sortDirection === 'asc' ? aText - bText : bText - aText;
                } else {
                    return sortDirection === 'asc'
                        ? aText.localeCompare(bText)
                        : bText.localeCompare(aText);
                }
            });

            rows.forEach(row => table.querySelector('tbody').appendChild(row));

            // Update sort direction classes
            headers.forEach(h => h.classList.remove('asc', 'desc'));
            header.classList.toggle('asc', sortDirection === 'asc');
            header.classList.toggle('desc', sortDirection === 'desc');
        });
    });
});



</script>

 <!-- Inclusion du fichier JavaScript -->
 <script src="{{ asset('js/dash.js') }}"></script>
 <script src="{{ asset('js/ajax.js') }}"></script>

  </body>
</html>
