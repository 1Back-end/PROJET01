
$(document).ready(function(){
    // Initialisez le plugin intl-tel-input avec le Cameroun comme pays par défaut
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        separateDialCode: false, // Ne pas afficher le préfixe à côté du champ de saisie
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        initialCountry: "cm" // Cameroun comme pays par défaut
    });

    // Définir le numéro de téléphone par défaut avec le préfixe du Cameroun (+237)
    iti.setNumber('+237');
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




    // Sélection des messages
    var successMessage = document.getElementById('success-message');
    var errorMessage = document.getElementById('error-message');

    // Fonction pour masquer le message après un délai
    function masquerMessage(messageElement) {
        if (messageElement) {
            setTimeout(function() {
                messageElement.style.display = 'none';
            }, 3000); // 3000 millisecondes = 3 secondes
        }
    }

    // Appeler la fonction pour masquer les messages
    masquerMessage(successMessage);
    masquerMessage(errorMessage);
