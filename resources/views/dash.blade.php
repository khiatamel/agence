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
				<img style="width:150px; height:80px; margin-top:-5px;margin-left:-5px;" src="../images/logoA.png" >
                </div>
                <li>
				<a href="{{ route('dash') }}">
					<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
					<span class="title">Tableau de bord</span>
				</a>
		</li>

        <li>
				<a href="{{ route('calender') }}">
					<span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
					<span class="title">calendrier</span>
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
					<span class="title">Hotels</span>
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
		<div class="search">
			<label for="">
				<input type="text" name="" id="" placeholder="search here">
			<ion-icon name="search-outline"></ion-icon>
			</label>
		</div>
		<div class="user">
            <li class="navbar-item">
                Admin : {{ Auth::user()->name }}     
            </li>
      </div>
	</div>

<div class="details">
	<div class="recentOrders" >
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
                    <option value="Agence" {{ request('role') === 'agence' ? 'selected' : '' }}>Agence</option>
                    <!-- Add more roles as needed -->
                </select>
                <button type="submit">Filter</button>
            </form>

        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Nom Complet</th>
                        <th>Numéro Téléphone</th>
                        <th>PassePort</th>
                        <th>Photo</th>
                        <th id="trier">Hotel <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Age (Enfant)</th>
                        <th id="trier">Groupe <span class="icon-arrow">&UpArrow;</span></th>
                        <th id="trier">  Statut <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reservation_omras as $reservation_omra)
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
                            <!-- Icône pour accepter -->
                            <a href="{{ route('dash.accept', $reservation_omra->id) }}" class="icon-btn-A" title="Accepter">
                                <i class="fas fa-check-circle text-success"></i>
                            </a>

                            <!-- Icône pour refuser -->
                            <a href="{{ route('dash.refuse', $reservation_omra->id) }}" class="icon-btn-R" title="Refuser">
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


	<div class="recentCustomers">
		<div class="cardHeader">
			<h2>Omra</h2>
		</div>
		<table id="omraTable">
            @foreach($omras as $omra)
            <tr data-id="{{ $omra->id }}">
                <td width="60px">
                    <div class="imgBox">
                        <img src="{{asset('/storage/images/'.$omra->photo)}}" alt="">
                    </div>
                </td>
                <td>
                    <h4>{{$omra->nom}}</h4><span>{{$omra->compagne}}</span>
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

document.querySelectorAll('.user-filter').forEach(filter => {
    filter.addEventListener('click', function(event) {
        event.preventDefault();
        const role = this.getAttribute('data-role');

        fetch(`/reservations/filter/${role}`)
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#customers_table tbody');
                tbody.innerHTML = '';

                data.reservations.forEach(reservation => {
                    tbody.innerHTML += `
                        <tr>
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
