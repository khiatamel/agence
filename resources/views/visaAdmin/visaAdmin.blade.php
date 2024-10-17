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
<style>/* Container for the form */
.recentCustomer {
    background-color: #2d3748; /* Dark background color */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow for elevation */
    max-width: 600px;
    color: #fff; /* White text */
    display: none; /* Initially hidden */
}

/* Form Elements */
.recentCustomer form {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

/* Label Styling */
.recentCustomer label {
    font-size: 1.1rem;
    color: #e2e8f0; /* Lighter text color for labels */
    margin-bottom: 8px;
}

/* Input Fields */
.recentCustomer input[type="text"], 
.recentCustomer input[type="number"], 
.recentCustomer select {
    background-color: #edf2f7; /* Light background for inputs */
    color: #2d3748; /* Dark text for readability */
    border: 1px solid #cbd5e0; /* Light border */
    border-radius: 8px;
    padding: 12px;
    font-size: 0.95rem;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

/* Input focus effect */
.recentCustomer input:focus,
.recentCustomer select:focus {
    border-color: #3182ce; /* Blue border on focus */
    box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.3); /* Blue focus shadow */
    outline: none;
}

/* Select Field Styling */
.recentCustomer select {
    appearance: none; /* Remove default arrow */
    background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%234A5568%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 class=%22feather feather-chevron-down%22%3E%3Cpolyline points=%226 9 12 15 18 9%22%3E%3C/polyline%3E%3C/svg%3E');
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px;
    width: 100%;
}

/* Button Styling */
.recentCustomer button {
    background-color: #126c7a; /* Blue background for the button */
    color: #fff; /* White text */
    padding: 12px 16px;
    border: none;
    width: 100%;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Button Hover Effect */
.recentCustomers button:hover {
    transform: scale(1.05); /* Zoom in by 5% */
}

/* Add spacing between form fields */
.recentCustomer div {
    margin-bottom: 16px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .recentCustomer {
        padding: 16px;
        width: 90%; /* Make the form take more width on smaller screens */
    }
    
    .recentCustomer button {
        width: 100%; /* Full-width button on mobile */
    }
}
</style>
<body>

<div class="container">
	<div class="navigation">
			<ul>
                <div class='img'>
				<img style="width:150px; height:80px; margin-top:-5px;margin-left:0px;" src="../images/logoA.png" >
                </div>
                <li>
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

		<li class="activ">
				<a href="#">
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
                       
                    </section>

                    <section class="table__body">
                        <table>
                            <thead>
                                <tr>
                                    <th id="trier">N°</th>
                                    <th>Nom Complet</th>
                                    <th>Fichier</th>
                                    <th>Prix</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="omraDetailsTableBody">
                                @foreach($reservations as $reservation)
                                    @foreach($reservation->reservationPersonnes as $personne)
                                        <tr>
                                            <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td> <!-- Numbering based on parent-child loop -->
                                            <td>{{ $personne->nom }}</td>

                                            <!-- Display each file related to this person -->
                                            <td>
                                                @foreach($personne->files as $file)
                                                    <a href="{{ asset('storage/' . $file->fichier) }}" target="_blank">Voir fichier</a><br>
                                                @endforeach
                                            </td>

                                            <!-- Display the price, if available -->
                                            <td>
                                                @if($personne->prix)
                                                    {{ number_format($personne->prix, 2) }} €
                                                @else
                                                    Non défini
                                                @endif
                                            </td>

                                            <!-- Action buttons (edit/delete) -->
                                            <td>
                                                <a href="{{ route('admin.reservation.edit', $personne->id) }}" class="btn btn-primary">Modifier</a>
                                                <form action="{{ route('admin.reservation.delete', $personne->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </section>

                </main>
            </div>
            <div class="recentCustomers" >
            <div class="recentCustomer" style="display:none;">
                <form action="{{ route('admin.reservation.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Display the current Nom complet -->
                    <div>
                        <label class="block mb-2 text-lg font-medium text-white dark:text-white" for="nom">Nom complet :</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="text" 
                            name="nom" 
                            id="nom" 
                            value="{{ $personne->nom }}" 
                            readonly
                        />
                    </div>

                    <!-- Modify the Price -->
                    <div>
                        <label class="block mb-2 text-lg font-medium text-white dark:text-white" for="prix">Prix :</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="number" 
                            name="prix" 
                            id="prix" 
                            value="{{ $personne->prix }}" 
                            required
                        />
                    </div>

                    <!-- Modify the Status -->
                    <div class="mt-4">
                        <label class="block mb-2 text-lg font-medium text-white dark:text-white" for="status">Status :</label>
                        <select 
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600"
                            name="status" 
                            id="status" 
                            required
                        >
                            <option value="accepted" {{ $personne->status == 'accepted' ? 'selected' : '' }}>Accepter</option>
                            <option value="refused" {{ $personne->status == 'refused' ? 'selected' : '' }}>Refuser</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 mt-4">
                        <button 
                            type="submit" 
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600"
                        >
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div></div>
    
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>

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

document.addEventListener('DOMContentLoaded', function() {
    const modifyButtons = document.querySelectorAll('.btn-primary'); // All "Modifier" buttons
    const nomInput = document.getElementById('nom');
    const prixInput = document.getElementById('prix');
    const statusSelect = document.getElementById('status');
    const form = document.querySelector('.recentCustomer form');
    
    modifyButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Get the data from the row
            const tr = this.closest('tr');
            const nom = tr.querySelector('td:nth-child(2)').innerText;  // Get the name
            const prix = tr.querySelector('td:nth-child(4)').innerText.replace(' €', '');  // Get the price

            // Assuming the form action contains the id of the person to be updated
            const personId = this.getAttribute('href').split('/').pop();

            // Fill in the form fields
            nomInput.value = nom;
            prixInput.value = prix;
            
            // Set form action to the correct route (for updating)
            form.action = `/admin/reservation/update/${personId}`;

            // Optionally adjust the status (default it to "accepted" or "refused" based on the actual status)
            const status = tr.dataset.status;
            statusSelect.value = status || 'accepted'; // Default to 'accepted'

            // Make the form visible
            document.querySelector('.recentCustomer').style.display = 'block';
        });
    });
});

</script>

 <!-- Inclusion du fichier JavaScript -->
 <script src="{{ asset('js/dash.js') }}"></script>
 <script src="{{ asset('js/ajax.js') }}"></script>

  </body>
</html>
