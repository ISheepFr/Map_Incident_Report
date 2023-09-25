<?php

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la date du formulaire
    $date = $_POST['date'];
    $addresse = $_POST['addresse'];
    $lat = $_POST['latitude'];
    $lon = $_POST['longitude'];
    // Récupérer la description du formulaire
    $description = $_POST['description'];
    if (strlen($description) > 256) {
        $description = substr($description, 0, 256);
    }

    $addresse_utf8 = mb_convert_encoding($addresse,"UTF-8");

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli('localhost', 'id20533672_root', 'id20533672_root', 'informatiqueM1*');
    if ($mysqli->connect_errno) {
        die("connexion a échoué: " . $mysqli->connect_error);
    }  
    mysqli_set_charset($mysqli, "utf8");
    $stmt = $mysqli->prepare("INSERT INTO incident_report (date, description, adress, lat, lon) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssdd', $date, $description, $addresse, $lat, $lon);
    $stmt->execute();
    
    // Vérifier s'il y a des fichiers téléchargés
    if(isset($_FILES['photos']['name']) && count($_FILES['photos']['name']) > 0) {
        // Dossier de destination pour les images
        $uploadDir = 'images/';

       

        $tab_pic = ["link_pict_1", "link_pict_2", "link_pict_3"];

        // Parcourir les fichiers téléchargés
        for($i = 0; $i < count($_FILES['photos']['name']); $i++) {
            $fileName = $_FILES['photos']['name'][$i];
            $tmpName = $_FILES['photos']['tmp_name'][$i];

            // Générer un nom de fichier unique
            $uniqueFileName = uniqid() . '_' . $fileName;

            // Déplacer le fichier téléchargé vers le dossier de destination
            if(move_uploaded_file($tmpName, $uploadDir . $uniqueFileName)) {
                // Utilisation de requêtes préparées pour insérer le nom de fichier dans la base de données
                $sql = "UPDATE incident_report SET $tab_pic[$i] = '$uniqueFileName' WHERE id = LAST_INSERT_ID()";
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();
                //$stmt->execute([$uniqueFileName]);

                

            } else {
               
            }
            
            
        }

        header("Location: index.php");
        exit; // Assurez-vous de terminer le script ici pour éviter toute exécution supplémentaire

    } else {
        // Aucun fichier téléchargé
        echo "Aucune image n'a été téléchargée.<br>";
    }
} else {
    // Le formulaire n'a pas été soumis
    echo "Le formulaire n'a pas été soumis.";
}

?>
