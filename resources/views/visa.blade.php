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
    <!-- Affichage des erreurs de validation -->
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  <div class="container">
    <form action="{{ route('demandeVisa.store') }}" method="POST">
        @csrf
        <div class="main-user-info">
            <!-- Champ sélection de destination -->
            <div class="user-input-box">
            <label for="destination">Destination:</label>
            <select name="destination" id="destination" required onchange="getVisaTypes(this.value)">
                <option value="">Sélectionner une destination</option>
                @foreach($visas as $visa)
                    <option value="{{ $visa->destination }}">{{ $visa->destination }}</option>
                @endforeach
            </select>
            </div>

            <!-- Champ sélection de type de visa -->
            <div class="user-input-box">
                <label for="type_visa_id">Type de Visa:</label>
                <select name="type_visa_id" id="type_visa_id" required>
                    <option value="">Sélectionner un type de visa</option>
                </select>
            </div>

            <!-- Champ nombre d'adultes -->
            <div class="user-input-box">
                <label for="nb_adultes">Nombre d'adultes:</label>
                <input type="number" id="nb_adultes" name="nb_adultes" min="1" required>
            </div>

            <!-- Champ nombre d'enfants -->
            <div class="user-input-box">
                <label for="nb_enfants">Nombre d'enfants:</label>
                <input type="number" id="nb_enfants" name="nb_enfants" min="0" max="3" required>
            </div>
        </div>

        <!-- Bouton de soumission -->
        <div class="form-submit-btn">
            <button type="submit">Suivant</button>
        </div>
    </form>
</div>

<!-- Script AJAX pour obtenir les types de visa -->
<script>
    function getVisaTypes(destination) {
        if(destination) {
            fetch(`/types-visa/${destination}`)
                .then(response => response.json())
                .then(data => {
                    const typeSelect = document.getElementById('type_visa_id'); // Corrected ID
                    typeSelect.innerHTML = '<option value="">Sélectionner un type de visa</option>'; // Reset the options
                    data.forEach(type => {
                        const option = document.createElement('option');
                        option.value = type.id;  // Utilise l'ID du type de visa
                        option.textContent = type.type;  // Le nom/type de visa à afficher
                        typeSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Erreur:', error));
        } else {
            document.getElementById('type_visa_id').innerHTML = '<option value="">Sélectionner un type de visa</option>';
        }
    }
</script>

  <!-- Inclusion du fichier JavaScript -->
  <script src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>
