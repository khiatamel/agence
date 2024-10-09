<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Font Awesome cdn css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/calender.css') }}"/>

    <title>Sanhadja Voyage</title>
</head>
<body>

<div class="container">
  <div class="navigation">
			<ul>
                <div class='img'>
				<img style="width:150px; height:80px; margin-top:-5px;margin-left:0px;" src="../images/logoA.png" >
                </div>
                <li >
				<a href="{{ route('dash') }}" >
					<span class="icon"><img src="images/kaaba.png" style="width:20px;"></span>
					<span class="title">Omra</span>
				</a>
		</li>

        <li class="activ">
				<a href="{{ route('calender') }}" >
					<span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
					<span class="title">calendrier</span>
				</a>
		</li>
        <li >
				<a href="{{route('hotels.index') }}">
					<span class="icon"><ion-icon name="business-outline"></ion-icon></span>
					<span class="title">Hotels</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="people-outline"></ion-icon></span>
					<span class="title">Omra</span>
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
				<a href="{{ route('logout') }}" class="navbar-link logout-link" 
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
					<span class="title">Sign Out</span>
				</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
		</li>

		</ul>
	</div>

<div class="main">
<div class="topbar">
		<div class="toggle">
			<ion-icon name="menu-outline"></ion-icon>
		</div>
		
		<div class="user">
            <li class="navbar-item">
                Admin : {{ Auth::user()->name }}     
            </li>
      </div>
	</div>

<div class="details">
	<div class="recentOrders">
	
    <div class="contain">
      <div class="left">
        <div class="calendar">
          <div class="month">
            <i class="fas fa-angle-left prev"></i>
            <div class="date">december 2015</div>
            <i class="fas fa-angle-right next"></i>
          </div>
          <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
          </div>
          <div class="days"></div>
          <div class="goto-today">
            <div class="goto">
              <input type="text" placeholder="mm/yyyy" class="date-input" />
              <button class="goto-btn">Go</button>
            </div>
            <button class="today-btn">Today</button>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="today-date">
          <div class="event-day">wed</div>
          <div class="event-date">12th december 2022</div>
        </div>
        <div class="events"></div>
        <div class="add-event-wrapper">
          <div class="add-event-header">
            <div class="title">Add Event</div>
            <i class="fas fa-times close"></i>
          </div>
          <div class="add-event-body">
            <div class="add-event-input">
              <input type="text" placeholder="Event Name" class="event-name" />
            </div>
            <div class="add-event-input">
              <input
                type="text"
                placeholder="Event Time From"
                class="event-time-from"
              />
            </div>
            <div class="add-event-input">
              <input
                type="text"
                placeholder="Event Time To"
                class="event-time-to"
              />
            </div>
          </div>
          <div class="add-event-footer">
            <button class="add-event-btn">Add Event</button>
          </div>
        </div>
      </div>
      <button class="add-event">
        <i class="fas fa-plus"></i>
      </button>
    </div>

	</div>


	<div class="recentCustomers">
   <div class="ToDo">
    <header>
        <h1>My To Do List</h1>
    </header>
    <form action="">
        <input type="text" class="todo-input" placeholder="To do">
        <button class="todo-button" type="submit">
            <i class="fas fa-plus-circle fa-lg"></i>
        </button>
        <div class="select">
            <select name="todos" class="filter-todo">
                <option value="all">All</option>
                <option value="completed">Completed</option>
                <option value="incomplete">Incomplete</option>
            </select>
        </div>
    </form>

    <div class="todo-container">
        <ul class="todo-list"></ul>
    </div>
   </div>
	</div>
</div>


</div>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


 <!-- Inclusion du fichier JavaScript -->
 <script src="{{ asset('js/dash.js') }}"></script>
 <script src="{{ asset('js/calender.js') }}"></script>

  </body>
</html>
