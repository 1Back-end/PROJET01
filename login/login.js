function showLoader() {
    // Cacher le bouton de connexion
    var submitButton = document.querySelector('input[name="connexion"]');
    submitButton.style.display = "none";

    // Afficher le loader
    var loader = document.getElementById("loader");
    loader.style.display = "inline-block";

    // Vous pouvez également soumettre le formulaire ici si nécessaire
    // document.querySelector('form').submit();
}