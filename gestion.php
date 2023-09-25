<!DOCTYPE html>
<html>
<head>
    <title>Display Database Information</title>
    <link rel="stylesheet" href="gestionCss.css">
    <script>
        function confirmDelete() {
            var confirmation = confirm("Are you sure you want to delete this entry?");
            if (confirmation) {
                // The user clicked "OK," so submit the form
                return true;
            } else {
                // The user clicked "Cancel," so do not submit the form
                return false;
            }
        }
    </script>
</head>
<body>
    <h1>Database Information</h1>

<?php
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=id20533672_maps_incident_report;charset=utf8', 'id20533672_root', 'informatiqueM1*');
    }
    catch(PDOException $e)    {
        die('Erreur l: '.$e->getMessage());
        
    }
    $check = $bdd->prepare("SELECT * FROM incident_report");
    $check->execute();

    if ($check->rowCount() > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Adress</th><th>Lat</th> <th>Lon</th> <th> Description </th> <th>Photo n°1</th> <th>Photo n°2 </th> <th> Photo n°3 </th> <th> DELETE </th> </tr>";

        while ($row = $check->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["adress"] . "</td>";
            echo "<td> " . $row["lat"] . "</td>";
            echo "<td> " . $row["lon"] . "</td>";
            echo "<td class=\"ow\">". $row["description"] . "</td>";
            echo "<td> <img src=\"images/" . $row["link_pict_1"] . "\"> </td>";
            echo "<td>" . $row["link_pict_2"] . "</td>";
            echo "<td>" . $row["link_pict_3"] . "</td>";
            echo "<td> <form action=\"del.php\" method=\"POST\" onsubmit=\"return confirmDelete();\">
                <input type=\"hidden\" name=\"delete_id\" value=\"" . $row["id"] . "\"> 
                <input type=\"submit\" value=\"Delete\"> </form> </td>" ; 
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found in the database.";
    }

    // Close the database connection
    ?>

</body>
</html>