// Afficher le popup
document.getElementById('signupBtn').onclick = function() {
    document.getElementById('signupPopup').style.display = 'block';
  }
  
  document.getElementById('loginBtn').onclick = function() {
    document.getElementById('loginPopup').style.display = 'block';
  }
  
  // Fermer le popup
  function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
  }
  
  // Fermer le popup en cliquant en dehors de celui-ci
  window.onclick = function(event) {
    if (event.target.classList.contains('popup')) {
      event.target.style.display = 'none';
    }
  }
  