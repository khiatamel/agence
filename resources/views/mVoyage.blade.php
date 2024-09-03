<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/mVoyage.css') }}" />

    <title>Sanhadja Voyage</title>
</head>
<body>
    <header class="navbar">
         <div class="navbar-logo">
            <img src="{{ asset('images/logoA.png') }}" alt="Logo">
        </div>
        <nav class="navbar-menu">
        <ul>
        <li><a href="{{ route('omra') }}">Omra</a></li>
          <li><a href="{{ route('visa')}}">Visa</a></li>
          <li><a href="{{ route('hotel')}}">Hotels</a></li>
          <li><a href="{{ route('bateau')}}">Bateau</a></li>
          <li><a href="{{ route('assurance')}}">Assurance</a></li>
          <li><a href="{{ route('voyageOrganisé')}}">Voyage organisé</a></li>
          <li><a href="{{ route('billet')}}">Billet</a></li>
        </ul>
        </nav>
        <div class="navbar-Sing">
            <button id="signupBtn">S'inscrire</button>
            <button id="loginBtn">Se connecter</button>
        </div>
    </header>
    
   <!-- Popup Inscrire -->
<div id="signupPopup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup('signupPopup')">&times;</span>
    <div class="header-with-image">
      <img src="{{ asset('images/l.png') }}" alt="Logo de l'entreprise" class="signup-image">
      <h2>Inscription</h2>
      
    </div>
    <form>
      <input type="text" placeholder="Nom d'utilisateur" required>
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Mot de passe" required>
      <button type="submit">S'inscrire</button>
    </form>
   </div>
</div>

    <!-- Popup Connecter -->
<div id="loginPopup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup('loginPopup')">&times;</span>
    <div class="header-with-image">
      <h2 >Connexion</h2>
      <img src="{{ asset('images/f.png') }}" alt="Logo de l'entreprise" class="login-image">
    </div>
    <form>
      <input type="text" placeholder="Nom d'utilisateur ou Email" required>
      <input type="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
    </form>
  </div>
</div>

<div class="trip-container">
  <!-- Photo and Description -->
  <div class="trip-header">
    <img src="{{ asset('images/tunis.jpg') }}" alt="Trip Image" class="trip-image">
    <div class="trip-description">
      <h2>Voyage Organisé - Tunisie</h2>
    </div>
  </div>
</div>

<div class="tab-container">
    <div class="tabs">
        <button class="tab-button active" onclick="openTab('presentation')">Présentation</button>
        <button class="tab-button" onclick="openTab('programme')">Programme</button>
        <button class="tab-button" onclick="openTab('tarifs')">Tarifs</button>
    </div>
    <div id="presentation" class="tab-content active presentation-section">
        <div class="trip-details">
            <div>
              <h3>Caractéristiques du Voyage</h3>
              <ul>
                <li><i class="fa fa-bus"></i> Voyage en bus</li>
                <li><i class="fa fa-map-marker-alt"></i> Hammamet, Tunis</li>
                <li><i class="fa fa-calendar"></i> 8 jours, 7 nuits</li>
               </ul>
            </div>
            <div>
              <h3>Dates Disponibles</h3>
              <ul>
                <li>
                    <label class="date-label">Du 02/07 au 09/07</label>
                    <button class="reserve-btn" onclick="openReservationPopup()">Réserver</button>
                </li>
                <li>
                    <label class="date-label">Du 08/07 au 15/07</label>
                    <button class="reserve-btn" onclick="openReservationPopup()">Réserver</button>
                </li>
                <li>
                    <label class="date-label">Du 14/07 au 21/07</label>
                    <button class="reserve-btn" onclick="openReservationPopup()">Réserver</button>
                </li>
              </ul>
            </div>
        </div>  
    </div>
    <!-- Programme Section -->
    <div id="programme" class="tab-content programme-section">
        <h3>Programme Très Riche en Excursions</h3>
            <ul>
                <li>Visite ville de Sousse</li>
                <li>Port El Kantaoui</li>
                <li>Souk El Arbi</li>
                <li>Visite Ville de Hammamet</li>
                <li>Souk Nabeul</li>
                <li>Carthageland (en extra)</li>
                <li>Bateau Pirates (en extra)</li>
                <li>Balade en mer (en extra)</li>
                <li>Jet Sky et Parachute (en extra)</li>
            </ul>
    </div>

    <div id="tarifs" class="tab-content">
        <div class="hotels-container">
            <h2>Nos Hôtels</h2>
        
                <!-- Hotel 1 -->
                <div class="hotel-cards">
                    <img src="{{ asset('images/t2.jpeg') }}" alt="">
                    <div class="hotel-card">
                        <h3>HOTEL PRESTIGE Ex IMPERIAL PARK</h3>
                        <p>En Demi-pension</p>
                        <ul>
                            <li>Hôtel récemment rénové (photos réelles)</li>
                            <li>Hôtel en plein cœur de zone touristique</li>
                            <li>Hôtel avec une plage privée</li>
                            <li>Hôtel avec toboggan</li>
                            <li>Hôtel avec une animation extraordinaire</li>
                            <li>Chambres spacieuse avec TV led & Réfrigérateur</li>
                        </ul>
                        <button class="open-pop-btn" onclick="openPopup('popupHotel1')">Voir les tarifs</button>
                    </div>
                </div>

                <!-- Popup Hotel 1 -->
            <div id="popupHotel1" class="pop">
                <div class="pop-content">
                    <span class="clos" onclick="closePopup('popupHotel1')">&times;</span>
                    <h3>Tarifs pour HOTEL PRESTIGE Ex IMPERIAL PARK</h3>
                    <ul class="prix">
                        <li>Chambres triples : 46 900 da</li>
                        <li>Chambres doubles : 49 900 da</li>
                        <li>Chambres singles : 66 900 da</li>
                        <li>Enfants-6 ans : gratuit (sans siège)</li>
                        <li>Enfants (6-12 ans) avec 1 adulte : 38 900 da</li>
                        <li>Enfants (6-12 ans) avec 2 adulte : 31 900 da</li>
                    </ul>
                </div>
            </div>

                 <!-- Hotel 2 -->
            <div class="hotel-cards">
                <img src="{{ asset('images/images (1).jpeg') }}" alt="">
                <div class="hotel-card">
                    <h3>HOTEL carribean world sun garden</h3>
                    <p>En demi-pension</p>
                    <ul>
                        <li>Hôtel récemment rénové</li>
                        <li>Hôtel en plein cœur de zone touristique sud</li>
                        <li>Hôtel avec une plage privée</li>
                        <li>Hôtel avec toboggan</li>
                        <li>Hôtel avec une animation extraordinaire</li>
                    </ul>
                    <button class="open-pop-btn" onclick="openPopup('popupHotel2')">Voir les tarifs</button>
                </div>
            </div>

                <!-- Popup Hotel 2 -->
            <div id="popupHotel2" class="pop">
                <div class="pop-content">
                    <span class="clos" onclick="closePopup('popupHotel2')">&times;</span>
                    <h3>Tarifs pour HOTEL carribean world sun garden</h3>
                    <ul class="prix">
                        <li>Chambres triples : 41 900 da</li>
                        <li>Chambres doubles : 44 900 da</li>
                        <li>Chambres singles : 59 900 da</li>
                        <li>Enfants-6 ans : gratuit (sans siège)</li>
                        <li>Enfants (6-12 ans) avec 1 adulte : 35 900 da</li>
                        <li>Enfants (6-12 ans) avec 2 adulte : 29 900 da</li>
                    </ul>
                </div>
            </div>

                <!-- Hotel 3 -->
            <div class="hotel-cards">
                <img src="{{ asset('images/t4.jpeg') }}" alt="">
                <div class="hotel-card">
                    <h3>HOTEL le ZENITH</h3>
                    <p>En demi-pension</p>
                    <ul>
                        <li>Hôtel récemment rénové</li>
                        <li>Hôtel en plein cœur de zone touristique nord</li>
                        <li>Hôtel avec une plage privée</li>
                        <li>Hôtel avec une animation extraordinaire</li>
                    </ul>
                    <button class="open-pop-btn" onclick="openPopup('popupHotel3')">Voir les tarifs</button>
                </div>
            </div>

                <!-- Popup Hotel 3 -->
            <div id="popupHotel3" class="pop">
                <div class="pop-content">
                    <span class="clos" onclick="closePopup('popupHotel3')">&times;</span>
                    <h3>Tarifs pour HOTEL le ZENITH</h3>
                    <ul class="prix">
                        <li>Chambres triples : 39 900 da</li>
                        <li>Chambres doubles : 41 900 da</li>
                        <li>Chambres singles : 57 900 da</li>
                        <li>Enfants-6 ans : gratuit (sans siège)</li>
                        <li>Enfants (6-12 ans) avec 1 adulte : 33 900 da</li>
                        <li>Enfants (6-12 ans) avec 2 adulte : 28 900 da</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------réservation-------------------->

<!-- Popup Structure -->
<div id="reservationPopup" class="pop">
    <div class="pop-content">
        <span class="close" onclick="closePopup('reservationPopup')">&times;</span>
        <h2>Réservation</h2>
        <form id="reservationForm">
            <!-- Existing fields -->
            
            <label for="date">Date de réservation :</label>
            <input type="date" id="date" name="date" required>

            <label for="guests">Hotel :</label>
            <input type="text" id="Hotel" name="Hotel" required>

          <label for="bateau">Chambre :</label>
            <select id="bateau" name="bateau" onchange="updateRoutes()">
            <option value="">Chambres triples</option>
            <option value="balearia">Chambres doubles </option>
            <option value="corsica">Chambres singles </option>
            </select>

            <label for="guests">Nombre de personnes :</label>
            <input type="number" id="guests" name="guests" required>


                 <!-- Number of children input -->
            <label for="number-of-children">Nombre d'enfants :</label>
            <input type="number" id="number-of-children" name="number-of-children" min="0" max="3" />

            <div class="button-container">
                 <button type="submit" onclick="window.location.href='{{ route('rsVoyage') }}'">Suivant</button>
            </div>
            
        </form>
    </div>
</div>

<script>
    function openPopup(popupId) {
    document.getElementById(popupId).style.display = "block";
    }

    function closePopup(popupId) {
    document.getElementById(popupId).style.display = "none";
    }
</script>

<script src="{{ asset('js/Voyage.js') }}"></script>
<script src="{{ asset('js/javascript.js') }}"></script>
<script src="{{ asset('js/reserveOmra.js') }}"></script>
</body>
</html>
