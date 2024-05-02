
function showLoader() {
    // Cacher le bouton
    document.getElementById("submitBtn").style.display = "none";
    // Afficher le loader
    document.getElementById("loader").style.display = "inline-block";

    // Utiliser setTimeout pour exécuter une fonction après 2 secondes
    setTimeout(function() {
        // Cacher le loader
        document.getElementById("loader").style.display = "none";
        // Afficher à nouveau le bouton
        document.getElementById("submitBtn").style.display = "inline-block";
        
        // Vous pouvez également soumettre le formulaire ici si nécessaire
        // document.getElementById("votreFormulaire").submit();
    }, 2000); // 2000 millisecondes = 2 secondes
}


    function togglePassword() {
        var passwordField = document.getElementById("cpassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    function toggleCPassword() {
        var passwordField = document.getElementById("ccpassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }



document.addEventListener("DOMContentLoaded", function() {
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        initialCountry: "CM", // Définition du Cameroun comme pays initial
        separateDialCode: false, // Ne pas séparer le code de pays
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        autoPlaceholder: "polite", // Ajouter un espace réservé automatiquement
        nationalMode: false, // Afficher le numéro complet sans le préfixe du pays
        allowDropdown: true, // Permettre à l'utilisateur de choisir un autre pays
        formatOnDisplay: true, // Formater le numéro lors de l'affichage
        autoHideDialCode: false, // Ne pas cacher le code de pays lorsqu'il est détecté automatiquement
        placeholderNumberType: "MOBILE", // Utiliser un espace réservé adapté aux numéros de téléphone mobile
    });

    // Préremplir le champ de saisie avec le préfixe du pays
    input.value = "+" + iti.getSelectedCountryData().dialCode;

    // Ajouter l'écouteur d'événement pour la vérification du numéro de téléphone lors de la saisie
    input.addEventListener("input", function() {
        var isValid = iti.isValidNumber();
        if (isValid) {
            input.classList.remove("error");
        } else {
            input.classList.add("error");
        }
    });
});


 // Récupérer l'élément input file
 var uploadImageInput = document.getElementById("upload-image");

 // Gestionnaire d'événements pour le clic sur l'image de profil
 document.getElementById("profile-image").addEventListener("click", function() {
     // Déclencher le clic sur l'élément input file
     uploadImageInput.click();
 });

 // Gestionnaire d'événements pour le changement de fichier dans l'input file
 uploadImageInput.addEventListener("change", function() {
     // Récupérer le fichier sélectionné
     var file = this.files[0];
     
     // Vérifier si un fichier a été sélectionné
     if (file) {
         // Créer un objet URL pour l'image sélectionnée
         var imageURL = URL.createObjectURL(file);
         
         // Mettre à jour l'image de profil avec la nouvelle photo
         document.getElementById("profile-image").src = imageURL;
     }
 });