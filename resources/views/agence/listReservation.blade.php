<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/listReserve.css') }}" />

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">

        <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <title>Sanhadja Voyage</title>
  </head>
<body>
  <div class="main-content">
        <div class="background-image-section">
          <header class="navbar">
                    
                  <div class="navbar-logo">
                    <img src="{{ asset('images/logoA.png') }}" alt="Logo">
                  </div>
            <div class="header-partner">
             <div class="account-menu">
                <div class="account-info">
                    <!-- Avatar avec initiale -->
                    <div class="avatar-circle">
                        <span class="initials">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                    <span class="username">{{ Auth::user()->name }}</span>
                    <button id="account-dropdown" class="dropdown-toggle">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu">
                    <ul>
                        <li><a href="{{ route('agence.listReservations') }}">Mes Réservations</a></li>
                        <li><a href="">Profil</a></li>
                        <li><a href="">Paramètres</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a></li>
                    </ul>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
               </div><!-- resources/views/agency/reservations.blade.php -->
             </div>
          </header>
        </div>
    </div>

 
        <div class="container">
            <h1>Mes Réservations</h1>
        
            @forelse($omrasWithReservations as $omra)
                <div class="omra-section">
                    <h2 class="omra-header" data-toggle="reservation-{{ $omra->id }}">
                        {{ $omra->nom }} ({{ $omra->compagne }}) 
                        <span class="toggle-icon">+</span> <!-- Toggle Icon -->
                    </h2>
                    <p>Date de départ : {{ $omra->depart }}</p>
                    <p>Date de retour : {{ $omra->retour }}</p>
        
                    @if($omra->reservations->isEmpty())
                        <p>Aucune réservation pour cette Omra.</p>
                    @else
                        <div class="reservation-table" id="reservation-{{ $omra->id }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom Complet</th>
                                        <th>Numéro Téléphone</th>
                                        <th>PassePort</th>
                                        <th>Photo</th>
                                        <th>Hotel</th>
                                        <th>Age(Enfant)</th>
                                        <th>Groupe</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($omra->reservations as $reservation)
                                    @if($reservation->user_id == Auth::user()->id)
                                        <tr>
                                            <td>{{ $reservation->nom }}</td>
                                            <td>{{ $reservation->numero }}</td>
                                            <td><a href="{{ Storage::url($reservation->passeport) }}" target="_blank">Voir le Passeport</a></td>
                                            <td><a href="{{ Storage::url($reservation->photo) }}" target="_blank">Voir la Photo</a></td>
                                            <td>{{ $reservation->hotel }}</td>
                                            <td>{{ $reservation->age }}</td>
                                            <td>{{ $reservation->group_name }}</td>
                                            @if($reservation->statut == 'accepté')
                                                <td style="color: green;">{{ $reservation->statut }}</td>
                                            @elseif($reservation->statut == 'refusé')
                                                <td style="color: red;">{{ $reservation->statut }}</td>
                                            @else
                                                <td style="color: blue;">{{ $reservation->statut }}</td>
                                            @endif
                                            
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            @empty
                <p>Aucune Omra trouvée pour cette agence.</p>
            @endforelse
        </div>
        
        <script>

    document.getElementById('account-dropdown').addEventListener('click', function() {
    var menu = document.getElementById('dropdown-menu');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

        document.addEventListener('DOMContentLoaded', function() {
            const omraHeaders = document.querySelectorAll('.omra-header');
        
            omraHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-toggle');
                    const reservationTable = document.getElementById(targetId);
                    const toggleIcon = this.querySelector('.toggle-icon');
                
                    // Toggle expanded class
                    if (reservationTable.classList.contains('expanded')) {
                        reservationTable.classList.remove('expanded');
                        toggleIcon.textContent = '+'; // Change icon to +
                    } else {
                        reservationTable.classList.add('expanded');
                        toggleIcon.textContent = '-'; // Change icon to -
                    }
                });
            });
        });

       
      </script>
    </body>
</html>
        