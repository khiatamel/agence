<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">

        <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <title>Sanhadja Voyage</title>
  </head>

<!-- CSS -->
<style>
/* Navbar Styles */


/* Make sure the content below the navbar is not hidden behind it */
.main-content {
    padding-top: 100px; /* Adjust padding based on navbar height */
}

.main-content {
    min-height: 100vh; /* Ensures content takes the full height of the viewport */
    display: flex;
    flex-direction: column;
    justify-content: center; /* Centers content vertically */
    align-items: center; /* Centers content horizontally */
    background-image: url('../images/home.png'); /* Your background image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Adjust footer position */
.site-footer {
    background-color: #2e7081;
    color: white;
    padding: 20px 0;
    text-align: center;
    width: 100%;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
}

.footer-row {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.footer-col {
    flex: 1;
    margin: 20px;
    min-width: 220px;
}

.footer-col h3 {
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
}

.footer-col p, 
.footer-col ul, 
.footer-col a {
    font-size: 12px;
    line-height: 1.6;
}

.footer-col ul {
    list-style-type: none;
    padding: 0;
}
.contact{
  border-bottom: 2px solid #ccc;
}
.footer-col ul li {
    margin-bottom: 5px;
}

.footer-col ul li a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-col ul li a:hover {
    color: #dfe6e9;
}

.footer-col .social-links {
    display: flex;
    justify-content: center;
}

.footer-col .social-links a {
    margin: 0 10px;
    font-size: 24px;
    color: white;
    transition: color 0.3s ease;
}

.footer-col .social-links a:hover {
    color: #dfe6e9;
}

.footer-bottom {
    margin-top: 30px;
    font-size: 14px;
    border-top: 1px solid #dfe6e9;
    padding-top: 20px;
}

.footer-bottom p {
    margin: 0;
}

</style>
  <body>
  <div class="main-content">
    <div class="background-image-section">
    <header class="navbar">
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
   
        <!-- Background image content or overlay if needed -->
    </div>
</div>
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

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-row">



            <!-- About Us Section -->
            <div class="footer-col">
                <h3>À Propos</h3>
                <p>Nous sommes une agence spécialisée dans les voyages organisés. Notre mission est de vous offrir des expériences inoubliables avec des séjours adaptés à vos besoins.</p>
            </div>
            
            <!-- Contact Section -->
            <div class="footer-col">
                <h3>Contactez-nous</h3>
                <ul class="contact">
                    <li><i class="fa fa-map-marker"></i> NEDROMA en face APC</li>
                    <li><i class="fa fa-phone"></i> 06 60 94 52 39 / 043 45 50 50</li>
                </ul>
                <ul class="contact">
                    <li><i class="fa fa-map-marker"></i> MAGHNIA à coté CPA</li>
                    <li><i class="fa fa-phone"></i> 06 60 94 52 38 / 043 49 59 49</li>
                </ul>
                <ul class="contact">
                    <li><i class="fa fa-map-marker"></i> TLEMCEN -Imama à coté banque CNEP</li>
                    <li><i class="fa fa-phone"></i> 06 60 94 52 32 / 043 22 24 20</li>
                </ul>
                <ul class="contact">
                    <li><i class="fa fa-map-marker"></i> REMCHI -Rue d'aereport messali el hadj</li>
                    <li><i class="fa fa-phone"></i> 06 57 09 26 38 / 043 43 99 03</li>
                </ul>
                <ul class="contact">
                    <li><i class="fa fa-map-marker"></i> ORAN -Boulvoird sidi chahmi derière CNAS el KHADRAI</li>
                    <li><i class="fa fa-phone"></i> 06 73 66 28 35 / 041 84 40 73</li>
                </ul>
            </div>

            <!-- Links Section -->
            <div class="footer-col">
                <h3>Liens Utiles</h3>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Nos Offres</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="footer-col">
                <h3>Suivez-nous</h3>
                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; 2024 SenhadjaVoyage.com </p>
    </div>
</footer>
    <!-- Inclusion du fichier JavaScript -->
    <script src="{{ asset('js/javascript.js') }}"></script>
  </body>
</html>
