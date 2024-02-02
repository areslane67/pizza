<?php
include_once("./src/data.inc.php");
include_once("./src/addcli.inc.php");

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
    <title>Ajouter un Client</title>
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
            <h1>Ajouter un nouveau client</h1>
            <form method="POST" action="">
                <label>Nom
                    <input type="text" name="nom" required>
                </label>
                <label>Prénom
                    <input type="text" name="prenom" required>
                </label>
                <label>Adresse
                    <input type="text" name="adresse" required>
                </label>
                <label>Ville
                    <input type="text" name="ville" required>
                </label>
                <label>Code Postal
                    <input type="text" name="codepostal" required>
                </label>
                <label>Titre
                    <input type="text" name="titre" required>
                </label>
                <label>Numéro de Téléphone
                    <input type="text" name="nrotel" required>
                </label>
                <input type="submit" name="add" value="Ajouter le client" id="ex">
            </form>
        </div>
    </main>
</body>
</html>
