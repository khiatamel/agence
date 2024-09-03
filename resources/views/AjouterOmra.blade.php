<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/ajouter.css') }}"/>

    <title>Sanhadja Voyage</title>
</head>
  <body>
    <div class="container">
      <h1 class="form-title">Ajouter Omra</h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="Nom">Nom</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter Full Name"/>
          </div>
          <div class="user-input-box">
            <label for="username">Date Départ</label>
            <input type="date"
                    id="username"
                    name="username"
                    placeholder="Enter Username"/>
          </div>
          <div class="user-input-box">
            <label for="date">Date de retour</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"/>
          </div>
          <div class="user-input-box">
          <label for="date">Type de vol</label>
            <select id="vol" name="vol">
                <option value="direct">Vol direct</option>
                <option value="indirect">Vol indirect</option>
            </select>
          </div>
          <div class="user-input-box">
            <label for="Hotels">Hotels</label>
            <input type="text"
                    id="password"
                    name="password"
                    placeholder="Enter Password"/>
          </div>
          <div class="user-input-box">
            <label for="Hotels">Nombre de place</label>
            <input type="number"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"/>
          </div>
        </div>
       
        <div class="form-submit-btn">
          <input type="submit" value="Ajouter">
        </div>
      </form>
    </div>
    <div class="container">

    </div>
  </body>
</html>