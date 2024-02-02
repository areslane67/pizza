<?php
include_once("./src/data.inc.php");
include_once("./src/addliv.inc.php");

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
    <title>Ajouter un Livreur</title>
    <!-- Ajoutez ici vos balises de style, liens vers des fichiers CSS, etc. -->
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
        <!-- Formulaire d'ajout -->
        <div class="ez">
            <h1>Ajouter un nouveau livreur</h1>
            <form method="POST" action="">
                <!-- Ajoutez vos champs de formulaire pour l'ajout d'un livreur -->
                <!-- Assurez-vous d'utiliser les vrais noms de colonnes de votre table -->
                <label>Nom*
                    <input type="text" name="nom" required>
                </label>
                <label>Prénom*
                    <input type="text" name="prenom" required>
                </label>
                <label>Date d'embauche*
                    <input type="date" name="dateembauche" required>
                </label>
                <input type="submit" name="add" value="Ajouter le livreur" id="ex">
            </form>
        </div>
    </main>
    <!-- Ajoutez ici vos balises de script, liens vers des fichiers JS, etc. -->
</body>
</html>
