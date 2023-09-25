document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("voyage-form");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire par défaut

        // Récupérez les valeurs des champs du formulaire
        const pays = document.getElementById("pays").value;
        const ville = document.getElementById("ville").value;
        const date = document.getElementById("date").value;

        // Créez une nouvelle fenêtre pour afficher les données saisies
        const newWindow = window.open('', '_blank', 'width=400,height=400');
        
        // Écrivez les données dans la nouvelle fenêtre
        newWindow.document.write(`
            <h2>Données saisies :</h2>
            <p><strong>Pays :</strong> ${pays}</p>
            <p><strong>Ville :</strong> ${ville}</p>
            <p><strong>Date :</strong> ${date}</p>
        `);
    });
});