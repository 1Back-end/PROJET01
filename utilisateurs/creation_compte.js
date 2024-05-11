
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



    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
      initialCountry: "CM",
      separateDialCode: true,
      geoIpLookup: callback => {
        fetch("https://ipapi.co/json")
          .then(res => res.json())
          .then(data => callback(data.country_code))
          .catch(() => callback("us"));
      },
      utilsScript: "/intl-tel-input/js/utils.js?1714642302458" // just for formatting/placeholders etc
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

 function goBack() {
    window.history.back();
}