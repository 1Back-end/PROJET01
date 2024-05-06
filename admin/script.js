
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner l'élément du numéro de téléphone
    var phoneInput = document.getElementById('phone');
    // Sélectionner l'élément du message
    var phoneMessage = document.getElementById('phoneMessage');

    // Sélectionner l'élément de sélection du drapeau
    var countrySelect = document.getElementById('countrySelect');

    // Ajouter un écouteur d'événements pour surveiller les changements dans la sélection du pays
    countrySelect.addEventListener('change', function () {
        // Afficher le message d'instruction
        phoneMessage.textContent = 'Entrez votre numéro de téléphone (9 chiffres après +237 pour le Cameroun).';
    });

    // Ajouter un écouteur d'événements pour surveiller les changements dans le champ de saisie
    phoneInput.addEventListener('input', function () {
        // Récupérer la valeur du champ de saisie
        var phoneNumber = phoneInput.value;

        // Validation : Vérifier si le numéro de téléphone contient 9 chiffres après le préfixe +237 (pour le Cameroun)
        if (phoneNumber.startsWith('+237') && phoneNumber.length !== 12) {
            phoneMessage.textContent = 'Le numéro de téléphone pour le Cameroun doit contenir 9 chiffres après le préfixe +237.';
        } else {
            // Effacer le message d'erreur
            phoneMessage.textContent = '';
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
