<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/visa.css') }}" />

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

<div class="titre"><h1>Demande Visa</h1></div>
    <div class="container">
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
             <label for="cars">Distination:</label>
             <select id="country" name="country">
              <option value="">--Sélectionnez un pays--</option>
              <option value="france">France</option>
              <option value="usa">États-Unis</option>
              <option value="canada">Canada</option>
              <option value="uk">Royaume-Uni</option>
              <option value="germany">Allemagne</option>
              <!-- Ajoutez d'autres pays ici -->
             </select>
          </div>
          <div class="user-input-box">
             <label for="cars">Type Visa:</label>
                    <select id="pays" name="pays"> 
                      <option value="">--Sélectionnez un type de visa--</option>
                      <!-- Types de visa pour France -->
                      <option data-country="france" value="tourist">Visa touristique</option>
                      <option data-country="france" value="business">Visa d'affaires</option>
                      <option data-country="france" value="student">Visa étudiant</option>
                    </select>
          </div>
          <div class="user-input-box">
            <label for="guests">Nombre de personnes :</label>
            <input type="number" id="guests" name="guests" required>
          </div>
          <div class="user-input-box">
                 <!-- Number of children input -->
            <label for="number-of-children">Nombre d'enfants :</label>
            <input type="number" id="number-of-children" name="number-of-children" min="0" max="3" />
          </div>

        </div>
        <div class="form-submit-btn">
          <input type="submit"  onclick="window.location.href='{{ route('rsVisa') }}'" value="Suivant">
        </div>
      </form>
    </div>


  <!-- Inclusion du fichier JavaScript -->
  <script src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>
