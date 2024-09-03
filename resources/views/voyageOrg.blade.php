<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
      
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/voyageOrg.css') }}">

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

    <!-- carousel -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
            <img src="{{ asset('images/tunis.jpg') }}">
            <div class="content">
                    <div class="title">Tunisie</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button Type="submit" onclick="window.location.href='{{ route('mVoyage') }}'">Read plus</button>
                    </div>
                </div>
            </div>
            <div class="item">
            <img src="{{ asset('images/istanbul.webp') }}">
            <div class="content">
                    <div class="title">Istanbul</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>Read plus</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/sharm1.jpg') }}">
                <div class="content">
                    <div class="title">Sharm el shikh</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>Read plus</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/4c.jpg') }}">
                <div class="content">
                    <div class="title">Paris</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>Read plus</button>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
            <img src="{{ asset('images/tunis.jpg') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/istanbul.webp') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                </div>
            </div>
            <div class="item">
            <img src="{{ asset('images/sharm1.jpg') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('images/4c.jpg') }}">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                </div>
            </div>
            
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>

  <!-- Inclusion du fichier JavaScript -->
  <script src="{{ asset('js/voyageOrg.js') }}"></script>
  <script src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>