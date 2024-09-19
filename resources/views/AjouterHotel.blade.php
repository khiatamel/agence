<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/ajouter.css') }}">
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
                <button id="toggleFormBtn" class="toggle-form-btn" onclick="window.location.href='{{ url('hotels/create')}}'">Ajouter Hotel</button>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1>Hotels</h1>
                        <div class="input-group">
                            <input type="search" id="searchInput" placeholder="Search Data...">
                            <ion-icon name="search-outline"></ion-icon>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
