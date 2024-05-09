
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















   
