<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./style_form.css" rel="stylesheet">
    <title>Formulaire</title>
</head>

<body>
    <div class="main">
        <h2>Formulaire</h2>

        <?php
        $addresse = $_POST['addresse'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude']; 
        echo '<p>Adresse: '.$addresse.'<br></p>';
        ?>
        <form action="traitement.php" method="post" enctype="multipart/form-data" class="form_incident">

        <label for="date">Date :</label>

        <input type="date" id="date" name="date" required><br><br>

        <label for="photos">Photos :</label>

        <input type="file" id="photos" name="photos[]" accept="image/*" multiple required><br><br>

        <label for="description">Description (max 256 caractères) :</label><br>

        <textarea id="description" name="description" rows="4" cols="50" maxlenght="256" oninput="countCharacters()" required></textarea>
        <p><span id="characterCount">0</span>/256.</p>

        <script>
        function countCharacters() {
            var textarea = document.getElementById("description");
            var counter = document.getElementById("characterCount");
            counter.textContent = textarea.value.length;
        }
        </script>
            
        <br><br>

        <input type="hidden" id="addr" name="addresse" value="<?php echo $addresse ?>" >
        <input type="hidden" id="lat" name="latitude" value="<?php echo $latitude ?>" >
        <input type="hidden" id="lon" name="longitude" value="<?php echo $longitude ?>" >
        <div class="btn">
            <a class="exit_btn" href="./index.php">Retour</a>
            <input class="submit_btn" type="submit" value="Soumettre">
        </div>
        </form>
    </div>
</body>

</html>