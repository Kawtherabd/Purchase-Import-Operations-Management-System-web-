document.addEventListener("DOMContentLoaded", function() {
  var buttons = document.getElementsByClassName("Accueil");

  for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function(event) {
      event.preventDefault(); // Empêche le comportement par défaut du lien

      var pageUrl = this.getAttribute("href");
      window.location.href = pageUrl; // Redirige vers l'URL de la page
    });
  }
});


function showConfirmation() {
  var overlay = document.getElementById('overlaysup');
  var confirmationWrapper = document.getElementById('confirmationWrapper');
  overlay.style.display = 'block';
  confirmationWrapper.style.display = 'block';
}

function hideConfirmation() {
  var overlay = document.getElementById('overlaysup');
  var confirmationWrapper = document.getElementById('confirmationWrapper');
  overlay.style.display = 'none';
  confirmationWrapper.style.display = 'none';
}

function confirmDeletion() {
  // Logique pour supprimer l'élément ou effectuer toute autre action souhaitée
  console.log("Confirmation de la suppression effectuée");
  hideConfirmation();
}

// Cacher le message de confirmation au chargement de la page
hideConfirmation();



/*// Récupérer tous les boutons de la sidebar
var sidebarButtons = document.getElementsByClassName("sidebar-button");

// Parcourir les boutons de la sidebar
for (var i = 0; i < sidebarButtons.length; i++) {
// Ajouter un écouteur d'événement à chaque bouton
sidebarButtons[i].addEventListener("click", function() {
  // Récupérer l'interface à afficher en utilisant l'attribut "data-interface"
  var interfaceId = this.getAttribute("data-interface");
  
  // Cacher toutes les interfaces
  var interfaces = document.getElementsByClassName("interface");
  for (var j = 0; j < interfaces.length; j++) {
    interfaces[j].classList.remove("active");
  }
  
  // Afficher l'interface correspondante
  document.getElementById(interfaceId).classList.add("active");
});
}

// Afficher l'interface par défaut
var defaultInterface = document.getElementsByClassName("interface")[0];
defaultInterface.classList.add("active");*/



/*// Récupérer tous les boutons de la sidebar
var sidebarButtons = document.getElementsByClassName("Buttons");

// Parcourir les boutons de la sidebar
for (var i = 0; i < sidebarButtons.length; i++) {
// Ajouter un écouteur d'événement à chaque bouton
sidebarButtons[i].addEventListener("click", function() {
  // Récupérer l'interface à afficher en utilisant l'attribut "data-interface"
  var interfaceId = this.getAttribute("data-interface");
  
  // Cacher toutes les interfaces
  var interfaces = document.getElementsByClassName("interface");
  for (var j = 0; j < interfaces.length; j++) {
    interfaces[j].style.display = "none";
  }
  
  // Afficher l'interface correspondante
  document.getElementById(interfaceId).style.display = "block";
});
}*/


















/*// Récupérer tous les boutons de la sidebar
var sidebarButtons = document.getElementsByClassName("Accueil");

// Récupérer la première interface et son bouton par défaut
var defaultInterface = document.querySelector(".interface");
var defaultButton = document.querySelector(".Accueil");

// Ajouter la classe "active" à l'interface et au bouton par défaut
defaultInterface.classList.add("active");
defaultButton.classList.add("active");

// Parcourir les boutons de la sidebar
for (var i = 0; i < sidebarButtons.length; i++) {
// Ajouter un écouteur d'événement à chaque bouton
sidebarButtons[i].addEventListener("click", function() {
  // Récupérer l'interface à afficher en utilisant l'attribut "data-interface"
  var interfaceId = this.getAttribute("data-interface");

  // Cacher toutes les interfaces
  var interfaces = document.getElementsByClassName("interface");
  for (var j = 0; j < interfaces.length; j++) {
    interfaces[j].style.display = "none";
  }

  // Afficher l'interface correspondante
  document.getElementById(interfaceId).style.display = "block";

  // Supprimer la classe "active" de tous les boutons de la sidebar
  for (var k = 0; k < sidebarButtons.length; k++) {
    sidebarButtons[k].classList.remove("active");
  }

  // Ajouter la classe "active" au bouton cliqué
  this.classList.add("active");
});
}*/






/*function afficherInterface(interfaceID) {
var interfaces = document.getElementsByClassName("interface");

// Cacher toutes les interfaces
for (var i = 0; i < interfaces.length; i++) {
  interfaces[i].style.display = "none";
}

// Afficher l'interface sélectionnée
var interfaceToShow = document.getElementById("interface" + interfaceID);
interfaceToShow.style.display = "block";
}

// Fonction pour afficher l'interface par défaut
function afficherInterfaceParDefaut() {
var defaultInterface = document.querySelector(".interface");
defaultInterface.classList.add("active");
}

// Appeler la fonction pour afficher l'interface par défaut
afficherInterfaceParDefaut();
*/

function afficherInterface(interfaceID) {
var interfaces = document.getElementsByClassName("interface");

// Vérifier si aucun ID d'interface n'est spécifié
if (!interfaceID) {
  // Afficher la première interface par défaut
  interfaces[0].style.display = "block";
  return;
}

// Cacher toutes les interfaces
for (var i = 0; i < interfaces.length; i++) {
  interfaces[i].style.display = "none";
}

// Afficher l'interface sélectionnée
var interfaceToShow = document.getElementById("interface" + interfaceID);
if (interfaceToShow) {
  interfaceToShow.style.display = "block";
}
}

document.addEventListener("DOMContentLoaded", function() {
// Afficher la première interface par défaut
afficherInterface();
});




 

function toggleForm() {
var overlay = document.getElementById('overlay');
var formWrapper = document.getElementById('formWrapper');
if (overlay.style.display === 'block') {
  overlay.style.display = 'none';
  formWrapper.style.display = 'none';
} else {
  overlay.style.display = 'block';
  formWrapper.style.display = 'block';
}
}