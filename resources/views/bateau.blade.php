<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/bateau.css') }}" />

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

<div class="titre"><h1>Réservation Bateau</h1></div>
    <div class="container">
      <form action="#">
           <!-- Input row containing three input fields -->
           <div class="input-row">
           <div class="user-input-box">
    <label for="bateau">Bateau :</label>
    <select id="bateau" name="bateau" onchange="updateRoutes()">
        <option value="">Sélectionnez un bateau</option>
        <option value="balearia">BALEARIA</option>
        <option value="corsica">CORSICA</option>
    </select>
</div>

<div class="user-input-box">
    <label for="depart">Départ :</label>
    <select id="depart" name="depart">
        <option value="">Sélectionnez un départ</option>
    </select>
</div>

<div class="user-input-box">
    <label for="destination">Distination :</label>
    <select id="destination" name="destination">
        <option value="">Sélectionnez une destination</option>
    </select>
</div>

          </div>
          <div class="main-user-info">
            <div class="user-input-box">
                <label for="départ">Date de départ :</label>
                <input type="date" id="départ" name="départ" required>
            </div>
          
            <div class="user-input-box">
                <label for="arrivée">Date d'arrivée :</label>
                <input type="date" id="arrivée" name="arrivée"  />
            </div>
            <div class="user-input-box">
                <label for="guests">Nombre de personnes :</label>
                <input type="number" id="personnes" name="personnes" required>
            </div>
          
            <div class="user-input-box">
                <label for="number-of-children">Nombre d'enfants :</label>
                <input type="number" id="number-of-children" name="number-of-children" min="0" max="3" />
            </div>
          </div>

          <div class="gender-details-box">
          <span class="gender-title">véhicule</span>
            <div class="user-input">
                <div class="input-group">
                    <label for="car-brand">Marque de la voiture</label>
                    <select id="car-brand" name="car-brand" onchange="updateModels()">
    <option value="">Sélectionnez une marque</option>
    <option value="acura">Acura</option>
    <option value="alfa-romeo">Alfa Romeo</option>
    <option value="aston-martin">Aston Martin</option>
    <option value="audi">Audi</option>
    <option value="bentley">Bentley</option>
    <option value="bmw">BMW</option>
    <option value="bugatti">Bugatti</option>
    <option value="buick">Buick</option>
    <option value="cadillac">Cadillac</option>
    <option value="chevrolet">Chevrolet</option>
    <option value="chrysler">Chrysler</option>
    <option value="citroen">Citroën</option>
    <option value="dacia">Dacia</option>
    <option value="daewoo">Daewoo</option>
    <option value="daihatsu">Daihatsu</option>
    <option value="dodge">Dodge</option>
    <option value="ferrari">Ferrari</option>
    <option value="fiat">Fiat</option>
    <option value="ford">Ford</option>
    <option value="genesis">Genesis</option>
    <option value="gmc">GMC</option>
    <option value="honda">Honda</option>
    <option value="hummer">Hummer</option>
    <option value="hyundai">Hyundai</option>
    <option value="infiniti">Infiniti</option>
    <option value="jaguar">Jaguar</option>
    <option value="jeep">Jeep</option>
    <option value="kia">Kia</option>
    <option value="lamborghini">Lamborghini</option>
    <option value="land-rover">Land Rover</option>
    <option value="lexus">Lexus</option>
    <option value="lincoln">Lincoln</option>
    <option value="maserati">Maserati</option>
    <option value="mazda">Mazda</option>
    <option value="mclaren">McLaren</option>
    <option value="mercedes-benz">Mercedes-Benz</option>
    <option value="mini">Mini</option>
    <option value="mitsubishi">Mitsubishi</option>
    <option value="nissan">Nissan</option>
    <option value="pagani">Pagani</option>
    <option value="peugeot">Peugeot</option>
    <option value="porsche">Porsche</option>
    <option value="ram">Ram</option>
    <option value="renault">Renault</option>
    <option value="rolls-royce">Rolls-Royce</option>
    <option value="saab">Saab</option>
    <option value="seat">SEAT</option>
    <option value="skoda">Škoda</option>
    <option value="subaru">Subaru</option>
    <option value="suzuki">Suzuki</option>
    <option value="tesla">Tesla</option>
    <option value="toyota">Toyota</option>
    <option value="volkswagen">Volkswagen</option>
    <option value="volvo">Volvo</option>
</select>
                </div>

                <div class="input-group">
                 <label for="car-model">Modèle de la voiture</label>
                    <select id="car-model" name="car-model">
                        <option value="">Sélectionnez d'abord une marque</option>
                    </select>
                </div>
            </div>
        
            <div class="form-submit-btn">
              <input type="submit"  onclick="window.location.href='{{ route('rsBateau') }}'" value="Suivant">
            </div>
          </div>
        </div>
      </form>
    </div>




  <!-- Inclusion du fichier JavaScript -->
  <script src="{{ asset('js/javascript.js') }}"></script>
  <script src="{{ asset('js/bateau.js') }}"></script>
  <script src="{{ asset('js/voiture.js') }}"></script>
</body>
</html>
