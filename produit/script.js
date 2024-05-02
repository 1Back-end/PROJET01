
document.addEventListener("DOMContentLoaded", function() {
    const departements = [
        "Djérem", "Faro-et-Déo", "Mayo-Banyo", "Mbéré", "Vina",
        "Haute-Sanaga", "Lekié", "Mbam-et-Inoubou", "Mbam-et-Kim", "Méfou-et-Afamba", 
        "Méfou-et-Akono", "Mfoundi", "Nyong-et-Kellé", "Nyong-et-Mfoumou", "Nyong-et-So'o",
        "Boumba-et-Ngoko", "Haut-Nyong", "Kadey", "Lom-et-Djérem",
        "Diamaré", "Logone-et-Chari", "Mayo-Danay", "Mayo-Kani", "Mayo-Sava",
        "Mayo-Tsanaga", "Moungo", "Nkam", "Sanaga-Maritime", "Wouri",
        "Bénoué", "Faro", "Mayo-Louti", "Mayo-Rey", "Boyo", "Bui",
        "Donga-Mantung", "Menchum", "Mezam", "Momo", "Ngo-Ketunjia",
        "Bamboutos", "Haut-Nkam", "Hauts-Plateaux", "Koung-Khi", "Menoua",
        "Mifi", "Ndé", "Noun", "Dja-et-Lobo", "Mvila", "Océan",
        "Vallée-du-Ntem", "Fako", "Koupé-Manengouba", "Lebialem", "Manyu",
        "Meme", "Ndian"
    ];

    const searchInput = document.getElementById("searchDepartements");
    const typeDepartmentsSuggestions = document.getElementById("typeDepartmentsSuggestions");

    // Fonction pour afficher les suggestions de départements correspondant à la recherche
    function showMatchingDepartments(searchValue) {
        typeDepartmentsSuggestions.innerHTML = ""; // Réinitialiser les suggestions

        const matchingDepartments = departements.filter(department => department.toLowerCase().includes(searchValue.toLowerCase()));
        matchingDepartments.forEach(department => {
            const suggestion = document.createElement("a");
            suggestion.classList.add("list-group-item", "matching-department");
            suggestion.textContent = department;
            suggestion.href = "javascript:void(0)"; // Éviter le rechargement de la page
            typeDepartmentsSuggestions.appendChild(suggestion);
        });

        // Afficher les suggestions si des correspondances ont été trouvées, sinon les cacher
        if (matchingDepartments.length > 0) {
            typeDepartmentsSuggestions.style.display = "block";
        } else {
            typeDepartmentsSuggestions.style.display = "none";
        }
    }

    // Ajouter un gestionnaire d'événements pour la saisie de texte
    searchInput.addEventListener("input", function() {
        showMatchingDepartments(this.value);
    });

    // Ajouter un gestionnaire d'événements pour gérer le clic sur les départements affichés
    typeDepartmentsSuggestions.addEventListener("click", function(event) {
        if (event.target.classList.contains("matching-department")) {
            searchInput.value = event.target.textContent.trim(); // Placer le département cliqué dans le champ de saisie
            typeDepartmentsSuggestions.style.display = "none"; // Cacher les suggestions après avoir cliqué
        }
    });

    // Ajouter un gestionnaire d'événements pour gérer les clics sur le document entier
    document.addEventListener("click", function(event) {
        // Vérifier si l'élément cliqué est à l'intérieur du champ de saisie ou de la liste des suggestions
        if (!searchInput.contains(event.target) && !typeDepartmentsSuggestions.contains(event.target)) {
            typeDepartmentsSuggestions.style.display = "none"; // Cacher les suggestions si l'utilisateur clique à l'extérieur
        }
    });
});





document.addEventListener("DOMContentLoaded", function() {
    const type_logement = [
        "Appartement Moderne", "Studio Moderne", "Chambre Moderne", "Duplex"
    ];
    type_logement.sort();
    const searchInput = document.getElementById("searchInput");
    const typeLogementSuggestions = document.getElementById("typeLogementSuggestions");

    // Fonction pour afficher les suggestions de types de logement correspondant à la recherche
    function showMatchingTypes(searchValue) {
        typeLogementSuggestions.innerHTML = ""; // Réinitialiser les suggestions

        const matchingTypes = type_logement.filter(type => type.toLowerCase().includes(searchValue.toLowerCase()));
        matchingTypes.forEach(type => {
            const suggestion = document.createElement("a");
            suggestion.classList.add("dropdown-item", "matching-type");
            suggestion.textContent = type;
            suggestion.href = "javascript:void(0)"; // Éviter le rechargement de la page
            typeLogementSuggestions.appendChild(suggestion);
        });

        // Afficher les suggestions si des correspondances ont été trouvées, sinon les cacher
        if (matchingTypes.length > 0) {
            typeLogementSuggestions.style.display = "block";
        } else {
            typeLogementSuggestions.style.display = "none";
        }
    }

    // Ajouter un gestionnaire d'événements pour la saisie de texte
    searchInput.addEventListener("input", function() {
        showMatchingTypes(this.value);
    });

    // Ajouter un gestionnaire d'événements pour gérer le clic sur les types de logement affichés
    typeLogementSuggestions.addEventListener("click", function(event) {
        if (event.target.classList.contains("matching-type")) {
            searchInput.value = event.target.textContent.trim(); // Placer le type de logement cliqué dans le champ de saisie
            typeLogementSuggestions.style.display = "none"; // Cacher les suggestions après avoir cliqué
        }
    });

    // Ajouter un gestionnaire d'événements pour gérer les clics sur le document entier
    document.addEventListener("click", function(event) {
        // Vérifier si l'élément cliqué est à l'intérieur du champ de saisie ou de la liste des suggestions
        if (!searchInput.contains(event.target) && !typeLogementSuggestions.contains(event.target)) {
            typeLogementSuggestions.style.display = "none"; // Cacher les suggestions si l'utilisateur clique à l'extérieur
        }
    });
});






document.addEventListener("DOMContentLoaded", function() {
    const regions = [
        "Adamaoua",
        "Centre",
        "Est",
        "Extrême-Nord",
        "Littoral",
        "Nord",
        "Nord-Ouest",
        "Ouest",
        "Sud",
        "Sud-Ouest"
    ];
    regions.sort();

    const searchInput = document.getElementById("searchRegions");
    const typeRegionsSuggestions = document.getElementById("typeRegionsSuggestions");

    // Fonction pour afficher les suggestions de régions correspondant à la recherche
    function showMatchingRegions(searchValue) {
        typeRegionsSuggestions.innerHTML = ""; // Réinitialiser les suggestions

        const matchingRegions = regions.filter(region => region.toLowerCase().includes(searchValue.toLowerCase()));
        matchingRegions.forEach(region => {
            const suggestion = document.createElement("a");
            suggestion.classList.add("list-group-item", "matching-region");
            suggestion.textContent = region;
            suggestion.href = "javascript:void(0)"; // Éviter le rechargement de la page
            typeRegionsSuggestions.appendChild(suggestion);
        });

        // Afficher les suggestions si des correspondances ont été trouvées, sinon les cacher
        if (matchingRegions.length > 0) {
            typeRegionsSuggestions.style.display = "block";
        } else {
            typeRegionsSuggestions.style.display = "none";
        }
    }

    // Ajouter un gestionnaire d'événements pour la saisie de texte
    searchInput.addEventListener("input", function() {
        showMatchingRegions(this.value);
    });

    // Ajouter un gestionnaire d'événements pour gérer le clic sur les régions affichées
    typeRegionsSuggestions.addEventListener("click", function(event) {
        if (event.target.classList.contains("matching-region")) {
            searchInput.value = event.target.textContent.trim(); // Placer la région cliquée dans le champ de saisie
            typeRegionsSuggestions.style.display = "none"; // Cacher les suggestions après avoir cliqué
        }
    });

    // Ajouter un gestionnaire d'événements pour gérer les clics sur le document entier
    document.addEventListener("click", function(event) {
        // Vérifier si l'élément cliqué est à l'intérieur du champ de saisie ou de la liste des suggestions
        if (!searchInput.contains(event.target) && !typeRegionsSuggestions.contains(event.target)) {
            typeRegionsSuggestions.style.display = "none"; // Cacher les suggestions si l'utilisateur clique à l'extérieur
        }
    });
});








document.addEventListener("DOMContentLoaded", function() {
    const arrondissements = [
        "Bankim", "Banyo", "Belel", "Dieki", "Dir", "Djohong", "Galim-Tignère", "Kongui-Douoh", "Kontcha", "Martap", "Mayo Nyalan", "Mayo-Baléo", 
        "Mayo-Darlé", "Mbe", "Mbitti", "Meiganga", "Nganha", "Ngaoui", "Ngaoundal", "Nyambaka", "Nyara Guessam", "Nyawa I", "Pangari", "Taram Siri",
        "Tchabbal Ngnagniri", "Tibati", "Tignère", "Afanloum", "Akoeman", "Akono", "Akonolinga", "Awaé", "Ayos", "Bafia", "Batchenga", "Bibey", 
        "Bikok", "Biyouha", "Bokito", "Bondjock", "Bot-Makak", "Deuk", "Dibang", "Dzeng", "Ebebda", "Edzendouan", "Elig-Mfomo", "Endom", "Éséka", 
        "Esse (Cameroun)", "Evodoula", "Kiiki", "Kon-Yambetta", "Lembe-Yezoum", "Lobo (Cameroun)", "Makak", "Makénéné", "Matomb", "Mbalmayo", 
        "Mbandjock (Haute-Sanaga)", "Mbangassina", "Mbankomo", "Mengang", "Mengueme", "Messondo", "Mfou", "Minta (Cameroun)", "Monatélé", 
        "Nanga-Eboko", "Ndikiniméki", "Ngambè-Tikar", "Ngog-Mapubi", "Ngomedzap", "Ngoro", "Ngoumou (commune)", "Nguibassal", "Nitoukou", 
        "Nkolafamba", "Nkolmetet", "Nkoteng", "Nsem", "Ntui", "Obala (Cameroun)", "Okola", "Ombessa", "Sa'a (Cameroun)", "Soa (Cameroun)", 
        "Yoko (Cameroun)", "Abong-Mbang", "Angossas", "Atok (Cameroun)", "Batouri", "Bélabo", "Bertoua", "Bétaré-Oya", "Diang", "Dimako", 
        "Doumaintang", "Doumé", "Gari-Gombo", "Garoua-Boulaï", "Kette", "Lomié", "Mandjou", "Mbang", "Mboma (Cameroun)", "Messamena", "Messok", 
        "Mindourou", "Moloundou", "Ndelele", "Ngoura", "Ngoyla", "Nguelemendouka", "Salapoumbé", "Somalomo", "Yokadouma", "Blangoua", 
        "Bogo (Cameroun)", "Bourha", "Darak", "Dargala", "Datcheka", "Fotokol", "Gazawa", "Gobo (Cameroun)", "Goulfey", "Guémé", 
        "Guéré (Cameroun)", "Guidiguis", "Hile-Alifa", "Hina (Cameroun)", "Kaélé", "Kai-Kai", "Kalfou", "Kar-Hay", "Kolofata", "Kousséri", 
        "Koza (Cameroun)", "Logone-Birni", "Maga (Cameroun)", "Makary", "Maroua I", "Maroua II", "Maroua III", "Meri (Cameroun)", "Mindif", 
        "Mogodé", "Mokolo", "Mora (Cameroun)", "Moulvoudaye", "Moutourwa", "Ndoukoula", "Petté", "Pohri", "Soulédé-Roua", "Taibong", 
        "Tchati-Bali", "Tokombéré", "Waza (ville)", "Wina", "Yagoua", "Zina (Cameroun)", "Dibamba (ville)", "Dibombari", "Dizangué", 
        "Édéa 1er", "Édéa 2e", "Loum", "Manjo", "Massock-Songloulou", "Mbanga", "Melong", "Mombo", "Mouanko", "Ndom", "Ngamb"
    ];
    arrondissements.sort();
    const searchInput = document.getElementById("searchArrondissement");
    const arrondissementsSuggestions = document.getElementById("arrondissementsSuggestions");

       // Fonction pour afficher les suggestions d'arrondissements correspondant à la recherche
       function showMatchingArrondissements(searchValue) {
        arrondissementsSuggestions.innerHTML = ""; // Réinitialiser les suggestions

        const matchingArrondissements = arrondissements.filter(arrondissement => arrondissement.toLowerCase().includes(searchValue.toLowerCase()));

        matchingArrondissements.forEach(arrondissement => {
            const suggestion = document.createElement("a");
            suggestion.classList.add("list-group-item", "list-group-item-action", "matching-arrondissement");
            suggestion.textContent = arrondissement;
            suggestion.href = "javascript:void(0)"; // Éviter le rechargement de la page
            arrondissementsSuggestions.appendChild(suggestion);
        });

        // Afficher les suggestions si des correspondances ont été trouvées, sinon les cacher
        if (matchingArrondissements.length > 0) {
            arrondissementsSuggestions.style.display = "block";
        } else {
            arrondissementsSuggestions.style.display = "none";
        }
    }

    // Ajouter un gestionnaire d'événements pour la saisie de texte
    searchInput.addEventListener("input", function() {
        showMatchingArrondissements(this.value);
    });

    // Ajouter un gestionnaire d'événements pour gérer le clic sur les arrondissements affichés
    arrondissementsSuggestions.addEventListener("click", function(event) {
        if (event.target.classList.contains("matching-arrondissement")) {
            searchInput.value = event.target.textContent.trim(); // Placer l'arrondissement cliqué dans le champ de saisie
            arrondissementsSuggestions.style.display = "none"; // Cacher les suggestions après avoir cliqué
        }
    });

    // Ajouter un gestionnaire d'événements pour gérer le clic en dehors des suggestions
    document.addEventListener("click", function(event) {
        if (!arrondissementsSuggestions.contains(event.target) && event.target !== searchInput) {
            arrondissementsSuggestions.style.display = "none"; // Cacher les suggestions lorsqu'on clique à l'extérieur
        }
    });
});


  

document.addEventListener("DOMContentLoaded", function() {
    const villes = [
        "Abong-Mbang", "Akonolinga", "Ambam", "Bafang", "Bafia", "Bafoussam", 
        "Bafut", "Bagangte", "Bali", "Bamenda", "Bandjoun", "Bangem", "Banyo", "Batouri", 
        "Bélabo", "Bertoua", "Buea", "Campo", "Dimako", "Dizangue", "Djoum", "Douala", 
        "Dschang", "Ebolowa", "Edéa", "Foumban", "Foumbot", "Garoua", "Goura", "Guider", "Idenau", "Kaélé",
        "Kousséri", "Kribi", "Kumba", "Kumbo", "Limbé", "Lomié", "Loum", "Mamfe", "Maroua", "Martap", 
        "Mbalmayo", "Mbandjock", "Mbouda", "Meiganga", "Melong", "Minam", "Mokolo", "Mora", "Mouloudou", 
        "Mutengene", "Ngaoundéré - railhead", "Nkambe", "Nkongsamba", "Obala", "Sa'a", "Sangmélima", 
        "Tibati", "Tiko", "Wum", "Yaoundé", "Yagoua", "Yomama", "Ndu"

    ];
    villes.sort();
    const searchInput = document.getElementById("searchVille");
    const villeSuggestions = document.getElementById("villeSuggestions");

    // Fonction pour afficher les suggestions de villes correspondant à la recherche
    function showMatchingVilles(searchValue) {
        villeSuggestions.innerHTML = ""; // Réinitialiser les suggestions

        const matchingVilles = villes.filter(ville => ville.toLowerCase().includes(searchValue.toLowerCase()));

        matchingVilles.forEach(ville => {
            const suggestion = document.createElement("a");
            suggestion.classList.add("list-group-item", "list-group-item-action", "matching-ville");
            suggestion.textContent = ville;
            suggestion.href = "javascript:void(0)"; // Éviter le rechargement de la page
            villeSuggestions.appendChild(suggestion);
        });

        // Afficher les suggestions si des correspondances ont été trouvées, sinon les cacher
        if (matchingVilles.length > 0) {
            villeSuggestions.style.display = "block";
        } else {
            villeSuggestions.style.display = "none";
        }
    }

    // Ajouter un gestionnaire d'événements pour la saisie de texte
    searchInput.addEventListener("input", function() {
        showMatchingVilles(this.value);
    });

    // Ajouter un gestionnaire d'événements pour gérer le clic sur les villes affichées
    villeSuggestions.addEventListener("click", function(event) {
        if (event.target.classList.contains("matching-ville")) {
            searchInput.value = event.target.textContent.trim(); // Placer la ville cliquée dans le champ de saisie
            villeSuggestions.style.display = "none"; // Cacher les suggestions après avoir cliqué
        }
    });

    // Ajouter un gestionnaire d'événements pour gérer le clic en dehors des suggestions
    document.addEventListener("click", function(event) {
        if (!villeSuggestions.contains(event.target) && event.target !== searchInput) {
            villeSuggestions.style.display = "none"; // Cacher les suggestions lorsqu'on clique à l'extérieur
        }
    });
});



  