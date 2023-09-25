<?php
// Check if the ID is received from POST or GET
if (isset($_POST['delete_id']) || isset($_GET['delete_id'])) {
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=id20533672_maps_incident_report;charset=utf8', 'id20533672_root', 'informatiqueM1*');
    }
    catch(PDOException $e)    {
        die('Erreur l: '.$e->getMessage());
        
    }
    // Get the ID to delete from either POST or GET
    $id_to_delete = isset($_POST['delete_id']) ? $_POST['delete_id'] : $_GET['delete_id'];

    // Prepare and execute the SQL delete statement
    $check = $bdd->prepare("DELETE FROM incident_report WHERE id = ?");
    $check->execute(array($id_to_delete)) ; 

    if ($check->rowCount() > 0) {
            echo "Entry with ID $id_to_delete has been deleted successfully.";
    } else {
            echo "No entry found with ID $id_to_delete.";
    }
} 
else {
    echo "No ID received to delete.";
}
header('Location: gestion.php');
exit() ; 
?>
