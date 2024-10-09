<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/agence.css') }}" />

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
            </div>
            </header>
             <!-- Background image content or overlay if needed -->
              
             <div class="logoCenter">
                <button id="openPop">Savoir Plus</button>
            </div>
        </div>
    </div>


<!-- Popup -->
<div id="pop" class="pop" style="display: none;">
    <div class="pop-content">
        <span class="close" id="closePop">&times;</span>
        <h2>Bienvenue chez Senhadja Voyage</h2>
        <p>un acteur clé dans le secteur du tourisme. Nous invitons les agences de voyages à rejoindre notre réseau de partenaires pour collaborer et offrir à vos clients des expériences inoubliables. En travaillant avec nous, vous aurez accès à des destinations exclusives, des services personnalisés, et une logistique fluide, assurant des séjours de qualité supérieure. Ensemble, nous pouvons offrir des offres attractives et des solutions sur mesure pour répondre aux besoins des voyageurs.
        </p>        
        <h2>مرحبا بكم في صنهاجة للسفر</h2>
        <p>إحدى الشركات الرائدة في قطاع السياحة. ندعو وكالات السفر للانضمام إلى شبكتنا من الشركاء للتعاون وتقديم تجارب لا تُنسى لعملائكم. من خلال العمل معنا، ستحصلون على وصول إلى وجهات حصرية وخدمات مخصصة ولوجستيات مرنة لضمان إقامة بجودة عالية. معاً، يمكننا تقديم عروض جذابة وحلول مخصصة لتلبية احتياجات المسافرين.</p>    </div>
</div>
   

  <div class="contain">
    <div class="titre"><h1>عروض العمرة </h1></div>
    <div class="container">
    @foreach($omras as $omra)
     @if($omra->place > 0)
      <div class="card__container">
        <article class="card__article">
            <img src="{{ asset('/storage/images/'.$omra->photo) }}" alt="image" class="card__img">
            <div class="range__details">
                <a href="{{ url('omra/'.$omra->id.'/détail') }}" class="no-underline">
                    <h2 class="card__title">{{ $omra->nom }}</h2>
                </a>

                <!-- Bouton pour afficher les commissions -->
                <div id="commissionBtn" class="commission">
                    <button id="openCommissionPopup">Commission</button>
                </div>

                <!-- Popup des commissions -->
                <div id="commissionPopup" class="popu" style="display: none;">
                    <div class="popu-content">
                        <span class="close" onclick="closePopup('commissionPopup')">&times;</span>
                        <h2>Prix de la Commission</h2>
                        <ul>
                            @foreach($omra->commissions as $commission)
                                <li>{{ $commission->condition }} : <strong>{{ $commission->prix }} دج</strong></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </article>
      </div>
     @endif
@endforeach



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
<script>
    document.getElementById('openPop').addEventListener('click', function() {
    document.getElementById('pop').style.display = 'flex';
});

// Fermer le popup
document.getElementById('closePop').addEventListener('click', function() {
    document.getElementById('pop').style.display = 'none';
});

    document.getElementById('account-dropdown').addEventListener('click', function() {
    var menu = document.getElementById('dropdown-menu');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

document.querySelectorAll('#openCommissionPopup').forEach(button => {
    button.addEventListener('click', function() {
        let popup = this.closest('.range__details').querySelector('#commissionPopup');
        popup.style.display = 'block';
    });
});
function openCommissionPopup(omraId) {
    const popup = document.getElementById('commissionPopup_' + omraId);
    if (popup) {
        popup.style.display = 'block';
    }
}

function closePopup(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
        popup.style.display = 'none';
    }
}

// Optionnel : Fermer le popup si on clique à l'extérieur
window.onclick = function(event) {
    const popups = document.getElementsByClassName('popu');
    for (let i = 0; i < popups.length; i++) {
        if (event.target === popups[i]) {
            popups[i].style.display = 'none';
        }
    }
};

</script>
    <script src="{{ asset('js/javascript.js') }}"></script>
  </body>
</html>
