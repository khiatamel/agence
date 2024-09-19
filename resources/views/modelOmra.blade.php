<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/mOmra.css') }}">

    <title>Sanhadja Voyage</title>
</head>
<style>
/* Card Background Styles */
.card__background {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    margin: 20px;
    max-width: 100%;
}

.card__background:hover {
    transform: scale(1.03);
}


/* Card Title */
.card__title {
    font-size: 24px;
    font-weight: bold;
    color: #ffff;
    text-align: center;
    margin-bottom: 10px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 1);
}

/* Section Title */
h4 {
    font-size: 18px;
    color: #333;
    margin: 15px 0;
    text-align: center;
}

/* Programme Details */
.programme-details {
    background-color: #ffff;
    padding: 10px;
    margin-bottom: 15px;
    border-left: 4px solid #ff6f61;
    font-size: 16px;
    color: black;
    border-radius: 5px;
    line-height: 1.6;
}

.programme-details p {
    margin: 5px 0;
}

/* No Programme Found Message */
p {
    color: black;
    font-size: 16px;
    text-align: center;
}


</style>
<body>
<!----------------header--------------------->
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


<!----------------container-------------------------------->
    <div class="container">
    <div class="card__container">
    <div class="card__background">
        <img src="{{ asset('images/telecharg.jpeg') }}" alt="image" class="card__img">
        
        <div class="card__content">
            <h2 class="card__title">{{$omra->nom}}</h2>
            <div>
                <div class="ribbon">{{$omra->place}} Places </div>
                @if($omra->type == 'Indirect')
                    <h4>رحلة غير مباشرة مع الخطوط الجوية التونسية</h4>
                    @if($programme)
                        @if($programme->parcourtD == "Oran/Medina")
                            <div class="programme-details">
                                <p>ذهاب : من وهران نزولا بتونس إلى جدة</p>
                                <p>العودة : من جدة نزولا بتونس إلى وهران</p>
                            </div>
                        @else
                            <p>Aucun programme trouvé pour cette Omra.</p>
                        @endif
                    @else
                        <p>Aucun programme trouvé pour cette Omra.</p>
                    @endif

                @elseif($omra->type == 'Direct' && $omra->compagne == 'SV')
                    <h4>رحلة مباشرة مع الخطوط الجوية السعودية</h4>
                    @if($programme)
                        @if($programme->parcourtD == "Oran/Medina")
                            <div class="programme-details">
                                <p>ذهاب : من وهران إلى المدينة</p>
                                <p>العودة : من جدة إلى وهران</p>
                            </div>
                        @else
                            <p>Aucun programme trouvé pour cette Omra.</p>
                        @endif
                    @else
                        <p>Aucun programme trouvé pour cette Omra.</p>
                    @endif

                @else
                    <h4>رحلة مباشرة مع الخطوط الجوية الجزائرية</h4>
                    @if($programme)
                        @if($programme->parcourtD == "Oran/Jeddah")
                            <div class="programme-details">
                                <p>ذهاب : من وهران إلى المدينة</p>
                                <p>العودة : من جدة إلى وهران</p>
                            </div>
                        @else
                            <div class="programme-details">
                                <p>ذهاب : من وهران إلى جدة</p>
                                <p>العودة : من المدينة إلى وهران</p>
                            </div>
                        @endif
                    @else
                        <p>Aucun programme trouvé pour cette Omra.</p>
                    @endif
                @endif
            </div><!--                
                <h3>: العرض يتضمن</h3>
                <h4>تأشيرة الدخول</h4>
                <h4>تذكرة الطائرة ذهاب و إياب</h4>
                <h4>التنقلات بالبقاع المقدسة بحافلات حديثة و مريحة</h4>
                <h4>الإقامة في فنادق مكة المكرمة و المدينة</h4>
                <h4>مزارات مكة المكرمة و المدينة المنورة</h4>
                <h4>الدعم الإرشادي و الديني طيلة الرحلة</h4>
                <h4>هدايا من الوكالة الى المعتمرين</h4> -->
            
            <!-- <button class="card__button" onclick="openReservationPopup()">Réserver</button> -->
        </div>
    </div>
</div>


<div class="titre">
                <h1>الفنادق المتوفرة في مكة المكرمة</h1>
            </div>

            <!-- Check if there are hotels associated with the Omra -->
            @if($omra->hotels->isEmpty())
                <p>Aucun hôtel associé à cette Omra.</p>
            @else
                @foreach($omra->hotels as $hotel)
                <div class="animated-section">

                    <!-- Slider for hotel photos -->
                    <div class="slider-container">  
                        @foreach($hotel->photos as $photo)
                            <img src="{{ asset('storage/images/'.$photo->photo) }}" alt="Image" class="section-image">
                        @endforeach
                        @foreach($hotel->photos as $photo)
                            <img src="{{ asset('storage/images/'.$photo->photo) }}" alt="Image" class="section-image">
                        @endforeach
                    </div>
                    

                    <!-- Hotel description section -->
                    <div class="section-description">
                        <div>
                            <h2>{{ $hotel->nom }}</h2>
                        </div>
                        <div>
                            <h5>م</h5>
                            <h5>{{ $hotel->desc }}</h5>
                            <h5>:المسافة من الفندق الى الحرم</h5>
                        </div>

                        <!-- Display tariffs for each room type -->
                        <h5>:سعر العمرة</h5>
                            @foreach($hotel->tarifs as $tarif)
                            <div>
                                <div>
                                    <h5>دج</h5><h5>{{ $tarif->prix }}</h5><h5><---------------{{ $tarif->condition }}</h5>
                                </div>
                            </div>
                        @endforeach

                        <!-- Reservation button -->
                         
                        <button class="card__button">
                            <a href="{{ route('reservation_omras.index', $omra->id) }}">Réserver</a>
                        </button>
                    </div>
                </div>
                @endforeach
            @endif
            
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

            <label for="guests">Nombre de personnes :</label>
            <input type="number" id="guests" name="guests" required>


                 <!-- Number of children input -->
            <label for="number-of-children">Nombre d'enfants :</label>
            <input type="number" id="number-of-children" name="number-of-children" min="0" max="3" />

            <div class="button-container">
                 <button type="submit" onclick="window.location.href='{{ route('rsOmra') }}'">Suivant</button>
            </div>
            
        </form>
    </div>
</div>
    
    <!-- Inclusion du fichier JavaScript -->
    <script src="{{ asset('js/javascript.js') }}"></script>
    <script src="{{ asset('js/reserveOmra.js') }}"></script>
</body>
</html>
