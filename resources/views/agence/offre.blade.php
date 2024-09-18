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
                <img src="{{ asset('images/Couverture Facebook.png') }}" alt="image" class="card__img">
                <div class="card__content">
                    <h2 class="card__title">مقعد {{$omra->place}} /{{$omra->nom}} </h2>
                    <div>
                        @if($omra->type == 'Indirect')
                            <h4>رحلة غير مباشرة مع الخطوط الجوية التونسية</h4>
                        @elseif($omra->type == 'Direct' && $omra->compagne == 'SV')
                            <h4>رحلة مباشرة مع الخطوط الجوية السعودية</h4>
                        @else
                            <h4>رحلة مباشرة مع الخطوط الجوية الجزائرية</h4>
                        @endif
                        <h3>: العرض يتضمن</h3>
                        <h4>تأشيرة الدخول</h4>
                        <h4>تذكرة الطائرة ذهاب و إياب</h4>
                        <h4>التنقلات بالبقاع المقدسة بحافلات حديثة و مريحة</h4>
                        <h4>الإقامة في فنادق مكة المكرمة و المدينة</h4>
                        <h4>مزارات مكة المكرمة و المدينة المنورة</h4>
                        <h4>الدعم الإرشادي و الديني طيلة الرحلة</h4>
                        <h4>هدايا من الوكالة الى المعتمرين</h4>
                    </div>
                    <button class="card__button" onclick="openReservationPopup()">Réserver</button>
                </div>
            </div>
        </div>
        <div class="titre"><h1>الفنادق المتوفرة في مكة المكرمة</h1></div>

                <!------------------Hotel1---------------------->
        <div class="animated-section">
            <div class="slider-container">       
                <img src="{{ asset('images/572081148.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115138.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115282.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115141.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572081157.jpg') }}" alt="Image" class="section-image">
                                 <!-- Repeat images for seamless loop -->
                <img src="{{ asset('images/572081148.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115138.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115282.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115141.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572081157.jpg') }}" alt="Image" class="section-image">

                
            </div>

             <div class="section-description">
                <div><h2>فندق أركان بكة بالمواصلات</h2></div>
                <div><h5>م</h5><h5>1800</h5><h5> :المسافة من الفندق الى الحرم </h5></div>
                <div><h5>:سعر العمرة حسب الغرف </h5></div>
                <div><h5>دج</h5><h5>176000</h5><h5><-------خماسية للعائلات </h5></div>
                <div><h5>دج</h5><h5>189000</h5><h5><----------------رباعية </h5></div> 
                <div><h5>دج</h5><h5>199000</h5><h5><-----------------ثلاثية </h5></div> 
                <div><h5>دج</h5><h5>215000</h5><h5><-----------------ثنائية </h5></div> 
                <div><h5>:سعر الأطفال </h5></div>
                        <div><h5>دج</h5><h5>58000</h5><h5><----من 0 إلى 1.99</h5></div>
                        <div><h5>دج</h5><h5>115000</h5><h5><----من 2 إلى 11.99</h5></div>
                <div style="color:red";><h5>دج</h5><h5>22000</h5><h5><--------------الإطعام</h5></div> 

                <button class="card__button" onclick="openReservationPopup()">Réserver</button>
            </div>
        </div>


                <!------------------Hotel2---------------------->
        <div class="animated-section">
            

             <div class="section-description">
                <div><h2>فندق الأيام أجياد</h2></div>
                <div><h5>م</h5><h5>600</h5><h5> :المسافة من الفندق الى الحرم </h5></div>
                <div><h5>:سعر العمرة حسب الغرف </h5></div>
                <div><h5>دج</h5><h5>176000</h5><h5><-------خماسية للعائلات </h5></div>
                <div><h5>دج</h5><h5>189000</h5><h5><----------------رباعية </h5></div> 
                <div><h5>دج</h5><h5>199000</h5><h5><-----------------ثلاثية </h5></div> 
                <div><h5>دج</h5><h5>215000</h5><h5><-----------------ثنائية </h5></div>
                <div></div>
                <div><h5>:سعر الأطفال </h5></div>
                        <div><h5>دج</h5><h5>58000</h5><h5><----من 0 إلى 1.99</h5></div>
                        <div><h5>دج</h5><h5>115000</h5><h5><----من 2 إلى 11.99</h5></div>
                <div style="color:red";><h5>دج</h5><h5>22000</h5><h5><--------------الإطعام</h5></div>  
                
 
                <button class="card__button" onclick="openReservationPopup()">Réserver</button>
            </div>
            <div class="slider-container">       
                <img src="{{ asset('images/510290762.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/564527477.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/564529228.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/564527734.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/510290787.jpg') }}" alt="Image" class="section-image">
                 <!-- Repeat images for seamless loop -->
                <img src="{{ asset('images/510290762.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/564527477.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/564529228.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/564527734.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/510290787.jpg') }}" alt="Image" class="section-image">
            </div>
        </div>


                <!------------------Hotel3---------------------->

        <div class="animated-section">
            <div class="slider-container">       
                <img src="{{ asset('images/572081148.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115138.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115282.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115141.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572081157.jpg') }}" alt="Image" class="section-image">
                <!-- Repeat images for seamless loop -->
                <img src="{{ asset('images/572081148.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115138.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115282.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572115141.jpg') }}" alt="Image" class="section-image">
                <img src="{{ asset('images/572081157.jpg') }}" alt="Image" class="section-image">
            </div>

             <div class="section-description">
                <div><h2>فندق فجر البديع 2</h2></div>
                <div><h5>م</h5><h5>300</h5><h5> :المسافة من الفندق الى الحرم </h5></div>
                <div><h5>:سعر العمرة حسب الغرف </h5></div>
                <div><h5>دج</h5><h5>176000</h5><h5><-------خماسية للعائلات </h5></div>
                <div><h5>دج</h5><h5>189000</h5><h5><----------------رباعية </h5></div> 
                <div><h5>دج</h5><h5>199000</h5><h5><-----------------ثلاثية </h5></div> 
                <div><h5>دج</h5><h5>215000</h5><h5><-----------------ثنائية </h5></div> 
                
                <div></div> 
                        <div><h5>:سعر الأطفال </h5></div>
                        <div><h5>دج</h5><h5>58000</h5><h5><----من 0 إلى 1.99</h5></div>
                        <div><h5>دج</h5><h5>115000</h5><h5><----من 2 إلى 11.99</h5></div>
                <div style="color:red";><h5>فطور الصباح مجاني</h5></div>
                
                   
 
                <button class="card__button" onclick="openReservationPopup()">Réserver</button>
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
