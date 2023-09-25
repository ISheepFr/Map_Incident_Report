<?php
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=id20533672_maps_incident_report;charset=utf8', 'root', '');
    }
    catch(PDOException $e)
    {
        die('Erreur l: '.$e->getMessage());
        
    }

    $check = $bdd->prepare("SELECT * FROM incident_report");
    $check->execute();

    if ($check->rowCount() > 0) {
        $tablePoints = [] ; 
        $tablePoints['pts'] = [] ; 

        while ($row = $check->fetch(PDO::FETCH_ASSOC)){
            extract($row); 

            $pts = [
                "id" => $id, 
                "adress" => $adress, 
                "lat" => $lat, 
                "lon" => $lon, 
                "date" => $date,
                "description" => $description,
                "link_pict_1" => $link_pict_1,
                "link_pict_2" => $link_pict_2,
                "link_pict_3" => $link_pict_3,
            ]; 

            $tablePoints['pts'][] = $pts ; 
        }

        echo json_encode($tablePoints) ; 
    }
    else{
        echo json_encode(["message" => "Error"]) ; 
    }
       
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $description = $_POST["description"];

    // Traitement des photos téléchargées (s'il y en a)
    $uploaded_photos = array();

    if (!empty($_FILES["photos"]["tmp_name"])) {
        foreach ($_FILES["photos"]["tmp_name"] as $key => $tmp_name) {
            $photo_name = $_FILES["photos"]["name"][$key];
            $photo_tmp_name = $_FILES["photos"]["tmp_name"][$key];

            // Vérifiez que le fichier est une image
            $image_info = getimagesize($photo_tmp_name);
            if ($image_info !== false) {
                $extension = pathinfo($photo_name, PATHINFO_EXTENSION);
                $new_photo_name = "uploads/photo_" . uniqid() . "." . $extension;

                // Déplacez la photo téléchargée vers un dossier de stockage
                move_uploaded_file($photo_tmp_name, $new_photo_name);

                // Ajoutez le nom du fichier téléchargé à un tableau
                $uploaded_photos[] = $new_photo_name;
            }
        }
    }
    // Enregistrez les données dans une base de données ou effectuez d'autres actions nécessaires
    // Par exemple, vous pouvez insérer ces données dans une base de données MySQL

    // Redirigez l'utilisateur vers une page de confirmation ou une autre page après le traitement
    $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : 'index.php';
    header("Location: $redirect_url");
    exit();
}
?> 