<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
      
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/rsBateau.css') }}">

  </head>
  <body>
  
    <div class="titre"><h1>Réservation Bateau</h1></div>
    <div class="container">
      <h1 class="form-title">Personnes 01</h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Nom</label>
            <input type="text"
                    id="Nom"
                    name="Nom"
                    placeholder="Enter le nom"/>
          </div>
          <div class="user-input-box">
            <label for="Prenom">Prenom</label>
            <input type="text"
                    id="Prenom"
                    name="Prenom"
                    placeholder="Enter le prenom"/>
          </div>
          
          <div class="user-input-box">
            <label for="password">PassePort(Scanner)</label>
            <input type="file" 
                    id="passeport" 
                    name="passport" 
                    placeholder="Enter Password"
                    accept="image/*,application/pdf" required>
          </div>
          <div class="user-input-box">
            <label for="password">Carte grise(Scanner)</label>
            <input type="file" 
                    id="photo" 
                    name="photo" 
                    placeholder="Enter photo"
                    accept="image/*,application/pdf" required>
          </div>
          <div class="user-input-box">
            <label for="numeroTéléphone">Numéro Téléphone</label>
            <input type="text"
                    id="numeroTéléphone"
                    name="numeroTéléphone"
                    placeholder="Enter le numéro téléphone"/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Genre</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Homme</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Femme</label>
           
          </div>
        </div>
      </form>
    </div>
    <div class="container">
      <h1 class="form-title">Personnes 01</h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Nom</label>
            <input type="text"
                    id="Nom"
                    name="Nom"
                    placeholder="Enter le nom"/>
          </div>
          <div class="user-input-box">
            <label for="Prenom">Prenom</label>
            <input type="text"
                    id="Prenom"
                    name="Prenom"
                    placeholder="Enter le prenom"/>
          </div>
          
          <div class="user-input-box">
            <label for="password">PassePort(Scanner)</label>
            <input type="file" 
                    id="passeport" 
                    name="passport" 
                    placeholder="Enter Password"
                    accept="image/*,application/pdf" required>
          </div>
          <div class="user-input-box">
            <label for="password">Carte grise(Scanner)</label>
            <input type="file" 
                    id="photo" 
                    name="photo" 
                    placeholder="Enter photo"
                    accept="image/*,application/pdf" required>
          </div>
          <div class="user-input-box">
            <label for="numeroTéléphone">Numéro Téléphone</label>
            <input type="text"
                    id="numeroTéléphone"
                    name="numeroTéléphone"
                    placeholder="Enter le numéro téléphone"/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Genre</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Homme</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Femme</label>
           
          </div>
        </div>
      </form>
    </div>
   
    <div class="form-submit-btn">
          <input type="submit" value="Confirmer la réservation">
    </div>
    
  </body>
</html>