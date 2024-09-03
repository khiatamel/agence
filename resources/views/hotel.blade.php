<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/hotel.css') }}" />

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

<div class="hotel-reservation">
    <h2>Réservation d'Hôtel</h2>
    <form>
        <div class="form-row">
            <div class="form-group">
                <label for="destination">Destination :</label>
                <input type="text" id="destination" name="destination" placeholder="Entrez la destination">
            </div>
            <div class="form-group">
                <label for="hotel-name">Nom de l'Hôtel :</label>
                <input type="text" id="hotel-name" name="hotel-name" placeholder="Entrez le nom de l'hôtel">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="departure-date">Date d'Aller :</label>
                <input type="date" id="departure-date" name="departure-date">
            </div>
            <div class="form-group">
                <label for="return-date">Date de Retour :</label>
                <input type="date" id="return-date" name="return-date">
            </div>
        </div>
        
        <label>Options :</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="option1"> Petit déjeuner</label>
            <label><input type="checkbox" name="option3"> All inclusive</label>
            <label><input type="checkbox" name="option2"> Demis pension</label>
            <label><input type="checkbox" name="option3"> All in soft</label>
            <label><input type="checkbox" name="option3"> Pension complete</label>
            <label><input type="checkbox" name="option3"> Vue mer</label>
        </div>
        
        <button type="submit">Réserver</button>
    </form>
</div>



  <!-- Inclusion du fichier JavaScript -->
  <script src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>