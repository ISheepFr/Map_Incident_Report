<!DOCTYPE html>
<html>
<head>
    <title>Map-Incident-Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 10px;
        }

        input[type="radio"], input[type="checkbox"] {
            margin: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Declaration d'un sinistre</h1>
    <form action="traitement.php" method="post">

	<h2>Type de sinistre :</h2>
	<input type="radio" name="type_de_sinistre" value="Seisme"> Seisme <br>
        <input type="radio" name="type_de_sinistre" value="Tsunami"> Tsunami <br>
        <input type="radio" name="type_de_sinistre" value="Incendie"> Incendie <br>
        <input type="radio" name="type_de_sinistre" value="Inondations"> Inondations <br>
	<input type="radio" name="type_de_sinistre" value="Tempetes"> Tempetes 

        <h2>Dégât Corporel :</h2>
        <input type="radio" name="degat_corporel" value="Aucun"> Aucun <br>
        <input type="radio" name="degat_corporel" value="Blesse_leger"> Blesse leger <br>
        <input type="radio" name="degat_corporel" value="Blesse_grave"> Blesse grave <br>
        <input type="radio" name="degat_corporel" value="Deces"> Deces

        <h2>Dangerosite :</h2>
        <input type="checkbox" name="dangerosite[]" value="Produit_toxique"> Produit Toxique <br>
        <input type="checkbox" name="dangerosite[]" value="Produit_inflammable"> Produit Inflammable <br>
	<input type="checkbox" name="dangerosite[]" value="Structure_instable"> Structure instable <br>
	<input type="checkbox" name="dangerosite[]" value="Acces_bloque"> Acces bloque


        <h2>Portee des degats :</h2>
	<input type="radio" name="Portee_des_degats" value="Meubles"> Meubles <br>
        <input type="radio" name="Portee_des_degats" value="Petit_batiment"> Petit batiment <br>
        <input type="radio" name="Portee_des_degats" value="Grand_batiment"> Grand batiment <br>
        <input type="radio" name="Portee_des_degats" value="Plusieurs_batiments"> Plusieurs Batiments

        <br><br>
        <input type="submit" value="Declarer">
    </form>
</body>
</html>