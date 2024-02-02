<?php
include_once("./src/data.inc.php");
include_once("./src/addpizz.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/formulaire.css">
    <title>Créer une Pizza</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="./index.php">Accueil</a></li>
            <li><a href="./livreur.php">Livreur</a></li>
            <li><a href="./client.php">Clients</a></li>
        </ul>
    </header>
    <main>
        <div class="ez">
            <h1>Créer une nouvelle pizza</h1>
            <form method="POST" action="">
                <label>Nom
                    <input type="text" name="design" required>
                </label>
                <label>Tarif
                    <input type="text" name="tarif" required>
                </label>
                <label>URL de la photo
                    <input type="url" name="url" required>
                </label>
                <input type="submit" name="create" value="Créer la pizza" id="ex">
            </form>
        </div>
    </main>
</body>
</html>
