<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/assrs.css') }}" />

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

<div class="titre"><h1>Demande Assurance</h1></div>
    <div class="container">
      <form action="#">
          <div class="user-input-bo">
             <label for="cars">Distination:</label>
<select id="country" name="country">
    <option value="">--Sélectionnez un pays--</option>
    <option value="afghanistan">Afghanistan</option>
    <option value="afrique_du_sud">Afrique du Sud</option>
    <option value="albanie">Albanie</option>
    <option value="algerie">Algérie</option>
    <option value="allemagne">Allemagne</option>
    <option value="andorre">Andorre</option>
    <option value="angola">Angola</option>
    <option value="antigua_et_barbuda">Antigua-et-Barbuda</option>
    <option value="arabie_saoudite">Arabie Saoudite</option>
    <option value="argentine">Argentine</option>
    <option value="armenie">Arménie</option>
    <option value="australie">Australie</option>
    <option value="autriche">Autriche</option>
    <option value="azerbaidjan">Azerbaïdjan</option>
    <option value="bahamas">Bahamas</option>
    <option value="bahrein">Bahreïn</option>
    <option value="bangladesh">Bangladesh</option>
    <option value="barbade">Barbade</option>
    <option value="belgique">Belgique</option>
    <option value="belize">Belize</option>
    <option value="benin">Bénin</option>
    <option value="bhoutan">Bhoutan</option>
    <option value="bielorussie">Biélorussie</option>
    <option value="birmanie">Birmanie</option>
    <option value="bolivie">Bolivie</option>
    <option value="bosnie_herzegovine">Bosnie-Herzégovine</option>
    <option value="botswana">Botswana</option>
    <option value="bresil">Brésil</option>
    <option value="brunei">Brunei</option>
    <option value="bulgarie">Bulgarie</option>
    <option value="burkina_faso">Burkina Faso</option>
    <option value="burundi">Burundi</option>
    <option value="cambodge">Cambodge</option>
    <option value="cameroun">Cameroun</option>
    <option value="canada">Canada</option>
    <option value="cap_vert">Cap-Vert</option>
    <option value="chili">Chili</option>
    <option value="chine">Chine</option>
    <option value="chypre">Chypre</option>
    <option value="colombie">Colombie</option>
    <option value="comores">Comores</option>
    <option value="coree_du_nord">Corée du Nord</option>
    <option value="coree_du_sud">Corée du Sud</option>
    <option value="costa_rica">Costa Rica</option>
    <option value="cote_d_ivoire">Côte d'Ivoire</option>
    <option value="croatie">Croatie</option>
    <option value="cuba">Cuba</option>
    <option value="danemark">Danemark</option>
    <option value="djibouti">Djibouti</option>
    <option value="dominique">Dominique</option>
    <option value="egypte">Égypte</option>
    <option value="emirats_arabes_unis">Émirats arabes unis</option>
    <option value="equateur">Équateur</option>
    <option value="erythree">Érythrée</option>
    <option value="espagne">Espagne</option>
    <option value="estonie">Estonie</option>
    <option value="eswatini">Eswatini</option>
    <option value="etats_unis">États-Unis</option>
    <option value="ethiopie">Éthiopie</option>
    <option value="fidji">Fidji</option>
    <option value="finlande">Finlande</option>
    <option value="france">France</option>
    <option value="gabon">Gabon</option>
    <option value="gambie">Gambie</option>
    <option value="georgie">Géorgie</option>
    <option value="ghana">Ghana</option>
    <option value="grece">Grèce</option>
    <option value="grenade">Grenade</option>
    <option value="guatemala">Guatemala</option>
    <option value="guinee">Guinée</option>
    <option value="guinee_bissau">Guinée-Bissau</option>
    <option value="guinee_equatoriale">Guinée équatoriale</option>
    <option value="guyana">Guyana</option>
    <option value="haiti">Haïti</option>
    <option value="honduras">Honduras</option>
    <option value="hongrie">Hongrie</option>
    <option value="inde">Inde</option>
    <option value="indonesie">Indonésie</option>
    <option value="irak">Irak</option>
    <option value="iran">Iran</option>
    <option value="irlande">Irlande</option>
    <option value="islande">Islande</option>
    <option value="israel">Israël</option>
    <option value="italie">Italie</option>
    <option value="jamaique">Jamaïque</option>
    <option value="japon">Japon</option>
    <option value="jordanie">Jordanie</option>
    <option value="kazakhstan">Kazakhstan</option>
    <option value="kenya">Kenya</option>
    <option value="kirghizistan">Kirghizistan</option>
    <option value="kiribati">Kiribati</option>
    <option value="koweit">Koweït</option>
    <option value="laos">Laos</option>
    <option value="lesotho">Lesotho</option>
    <option value="lettonie">Lettonie</option>
    <option value="liban">Liban</option>
    <option value="liberia">Libéria</option>
    <option value="libye">Libye</option>
    <option value="liechtenstein">Liechtenstein</option>
    <option value="lituanie">Lituanie</option>
    <option value="luxembourg">Luxembourg</option>
    <option value="madagascar">Madagascar</option>
    <option value="malaisie">Malaisie</option>
    <option value="malawi">Malawi</option>
    <option value="maldives">Maldives</option>
    <option value="mali">Mali</option>
    <option value="malte">Malte</option>
    <option value="maroc">Maroc</option>
    <option value="marshall">Îles Marshall</option>
    <option value="maurice">Maurice</option>
    <option value="mauritanie">Mauritanie</option>
    <option value="mexique">Mexique</option>
    <option value="micronesie">Micronésie</option>
    <option value="moldavie">Moldavie</option>
    <option value="monaco">Monaco</option>
    <option value="mongolie">Mongolie</option>
    <option value="montenegro">Monténégro</option>
    <option value="mozambique">Mozambique</option>
    <option value="namibie">Namibie</option>
    <option value="nauru">Nauru</option>
    <option value="nepal">Népal</option>
    <option value="nicaragua">Nicaragua</option>
    <option value="niger">Niger</option>
    <option value="nigeria">Nigéria</option>
    <option value="norvege">Norvège</option>
    <option value="nouvelle_zelande">Nouvelle-Zélande</option>
    <option value="oman">Oman</option>
    <option value="ouganda">Ouganda</option>
    <option value="ouzbekistan">Ouzbékistan</option>
    <option value="pakistan">Pakistan</option>
    <option value="palaos">Palaos</option>
    <option value="panama">Panama</option>
    <option value="papouasie_nouvelle_guinee">Papouasie-Nouvelle-Guinée</option>
    <option value="paraguay">Paraguay</option>
    <option value="pays_bas">Pays-Bas</option>
    <option value="perou">Pérou</option>
    <option value="philippines">Philippines</option>
    <option value="pologne">Pologne</option>
    <option value="portugal">Portugal</option>
    <option value="qatar">Qatar</option>
    <option value="republique_centrafricaine">République centrafricaine</option>
    <option value="republique_dominicaine">République dominicaine</option>
    <option value="republique_democratique_du_congo">République démocratique du Congo</option>
    <option value="republique_tcheque">République tchèque</option>
    <option value="roumanie">Roumanie</option>
    <option value="royaume_uni">Royaume-Uni</option>
    <option value="russie">Russie</option>
    <option value="rwanda">Rwanda</option>
    <option value="saint_christophe_et_nieves">Saint-Christophe-et-Niévès</option>
    <option value="sainte_lucie">Sainte-Lucie</option>
    <option value="saint_marin">Saint-Marin</option>
    <option value="saint_vincent_et_les_grenadines">Saint-Vincent-et-les-Grenadines</option>
    <option value="salomon">Îles Salomon</option>
    <option value="samoa">Samoa</option>
    <option value="sao_tome_et_principe">Sao Tomé-et-Principe</option>
    <option value="senegal">Sénégal</option>
    <option value="serbie">Serbie</option>
    <option value="seychelles">Seychelles</option>
    <option value="sierra_leone">Sierra Leone</option>
    <option value="singapour">Singapour</option>
    <option value="slovaquie">Slovaquie</option>
    <option value="slovenie">Slovénie</option>
    <option value="somalie">Somalie</option>
    <option value="soudan">Soudan</option>
    <option value="soudan_du_sud">Soudan du Sud</option>
    <option value="sri_lanka">Sri Lanka</option>
    <option value="suede">Suède</option>
    <option value="suisse">Suisse</option>
    <option value="suriname">Suriname</option>
    <option value="syrie">Syrie</option>
    <option value="tadjikistan">Tadjikistan</option>
    <option value="tanzanie">Tanzanie</option>
    <option value="tchad">Tchad</option>
    <option value="thailande">Thaïlande</option>
    <option value="timor_oriental">Timor oriental</option>
    <option value="togo">Togo</option>
    <option value="tonga">Tonga</option>
    <option value="trinite_et_tobago">Trinité-et-Tobago</option>
    <option value="tunisie">Tunisie</option>
    <option value="turkmenistan">Turkménistan</option>
    <option value="turquie">Turquie</option>
    <option value="tuvalu">Tuvalu</option>
    <option value="ukraine">Ukraine</option>
    <option value="uruguay">Uruguay</option>
    <option value="vanuatu">Vanuatu</option>
    <option value="venezuela">Venezuela</option>
    <option value="vietnam">Vietnam</option>
    <option value="yemen">Yémen</option>
    <option value="zambie">Zambie</option>
    <option value="zimbabwe">Zimbabwe</option>
</select>

          </div>
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="guests">Nombre de personnes :</label>
            <input type="number" id="guests" name="guests" required>
          </div>

          <div class="user-input-box">
                 <!-- Number of children input -->
            <label for="number-of-children">Nombre d'enfants :</label>
            <input type="number" id="number-of-children" name="number-of-children" min="0" max="3" />
          </div>

          <div class="user-input-box">
            <label for="date">Date de départ :</label>
            <input type="date" id="départ" name="départ" required>
          </div>

          <div class="user-input-box">
            <label for="retour">Date de retour :</label>
            <input type="date" id="retour" name="retour" required>
          </div>

        </div>
        <div class="form-submit-btn">
          <input type="submit"  onclick="window.location.href='{{ route('rsAssurance') }}'" value="Suivant">
        </div>
      </form>
    </div>


  <!-- Inclusion du fichier JavaScript -->
  <script src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>
