<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}"/>

    <title>Sanhadja Voyage</title>
</head>

<body>

	<div class="container">
		<div class="navigation">
			<ul>
                <div class='img'>
				<img style="width:150px; height:80px; margin-top:-5px;margin-left:-5px;" src="../images/logoA.png" >
                </div>
                <li>
				<a href="{{ route('dash') }}">
					<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
					<span class="title">Omra</span>
				</a>
		</li>

        <li>
				<a href="{{ route('calender') }}">
					<span class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
					<span class="title">calendrier</span>
				</a>
		</li>

		<li class="activ">
				<a href="#">
					<span class="icon"><ion-icon name="people-outline"></ion-icon></span>
					<span class="title">Hotel</span>
				</a>
		</li>

        <li>
				<a href="#">
					<span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
					<span class="title">Hotels</span>
				</a>
		</li>
        
		<li>
				<a href="#">
					<span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
					<span class="title">Voyage Organisé</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="help-circle-outline"></ion-icon></span>
					<span class="title">Visa</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
					<span class="title">Assurance</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<span class="title">billet</span>
				</a>
		</li>
	<li>
				<a href="#">
					<span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
					<span class="title">Sign Out</span>
				</a>
		</li>
        
		</ul>
		</div>

<div class="main">
    <div class="topbar">
		<div class="toggle">
			<ion-icon name="menu-outline"></ion-icon>
		</div>
		<div class="omra-management-buttons">
            <a href="" class="topbar-btn">
                <ion-icon name="document-text-outline"></ion-icon>
                <span>Programmes</span>
            </a>
            <a href="" class="topbar-btn">
                <ion-icon name="pricetag-outline"></ion-icon>
                <span>Offres</span>
            </a>
            <a href="" class="topbar-btn">
                <ion-icon name="people-outline"></ion-icon>
                <span>Clients</span>
            </a>
        </div>
		<div class="user">
            <li class="navbar-item">
                Admin : {{ Auth::user()->name }}     
            </li>
        </div>
          <!-- Boutons de gestion d'Omra dans la topbar -->
    
	</div>
    <div class="details">
    <div class="recentOrders">
        <main class="table" id="customers_table">
            <!-- Contenu des commandes récentes -->
        </main>
    </div>

    <!-- Nouvelle section pour la gestion d'Omra -->
    <div class="omra-management">
        <h2>Gestion Omra</h2>
        <div class="management-options">
            <div class="option">
                <a href="" class="btn">
                    <ion-icon name="document-text-outline"></ion-icon>
                    <span>Programmes Omra</span>
                </a>
            </div>
            <div class="option">
                <a href="" class="btn">
                    <ion-icon name="pricetag-outline"></ion-icon>
                    <span>Offres Omra</span>
                </a>
            </div>
            <div class="option">
                <a href="" class="btn">
                    <ion-icon name="people-outline"></ion-icon>
                    <span>Clients Omra</span>
                </a>
            </div>
        </div>
    </div>
</div>

</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


 <!-- Inclusion du fichier JavaScript -->
 <script src="{{ asset('js/dash.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>
