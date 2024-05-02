
    var passwordInputs = document.querySelectorAll('.password-input');
    var togglePasswords = document.querySelectorAll('.toggle-password');
    
    togglePasswords.forEach(function(toggle, index) {
        toggle.addEventListener('change', function() {
            passwordInputs[index].type = this.checked ? 'text' : 'password';
        });
    });

    passwordInputs.forEach(function(input, index) {
        input.addEventListener('input', function() {
            togglePasswords[index].style.display = this.value !== '' ? 'inline-block' : 'none';
        });
    });

    var input = document.querySelector("#telephone");
    var iti = window.intlTelInput(input, {
        initialCountry: "cm",
        separateDialCode: false, // Ne pas séparer le préfixe
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    // Mettre à jour le drapeau sélectionné
    input.addEventListener('countrychange', function(event) {
        var selectedCountryData = iti.getSelectedCountryData();
        var flagElement = document.getElementById('selected-flag');
        flagElement.innerHTML = '';
        var flagIcon = document.createElement('div');
        flagIcon.classList.add('iti__flag', 'iti__' + selectedCountryData.iso2);
        flagElement.appendChild(flagIcon);
    });

    // Mettre à jour la saisie avec le préfixe
    input.addEventListener('input', function(event) {
        var selectedCountryData = iti.getSelectedCountryData();
        var countryCode = selectedCountryData.dialCode;
        var inputValue = input.value.replace('+' + countryCode, '');
        var sanitizedValue = inputValue.replace(/[^\d]/g, ''); // Supprimer tout sauf les chiffres
        input.value = '+' + countryCode + sanitizedValue;
    });




    // Récupérer l'élément input pour le champ de fichier
    var input = document.getElementById('photo');

    // Écouter l'événement de changement
    input.addEventListener('change', function(event) {
        // Récupérer le fichier sélectionné
        var file = event.target.files[0];

        // Créer un objet URL pour le fichier sélectionné
        var imageURL = URL.createObjectURL(file);

        // Mettre à jour l'attribut src de l'élément img
        var previewImage = document.getElementById('preview-image');
        previewImage.src = imageURL;
    });



    document.querySelector('.edit-indicator').addEventListener('click', function() {
    document.getElementById('photo').click();
});
















   
