<?php
include_once("./src/data.inc.php");
include_once("./src/deleteclient.inc.php");
include_once("./src/updateC.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/modifLC.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/modif.css">

    <title>Modifier Client</title>
    <!-- Ajoutez ici vos balises de style, liens vers des fichiers CSS, etc. -->
</head>
<body>
    <header>
        <ul>
            <li><a href="./index.php">acceuil</a></li>
            <li><a href="./livreur.php">livreur</a></li>
            <li><a href="./client.php">clients</a></li>
        </ul>
    </header>
    <main>
        

        <!-- Formulaire de mise à jour -->
        <div class="ez">
            <h1>Modifier profil du client</h1>

            <form method="POST" action="">
                <!-- Ajoutez vos champs de formulaire avec les valeurs actuelles du client -->
                <!-- Assurez-vous d'utiliser les vrais noms de colonnes de votre table -->
                <label>Nom*
                    <input type="text" name="nom" value="<?= $client['NOMCLIE'] ?>" required>
                </label>
                <label>Prénom*
                    <input type="text" name="prenom" value="<?= $client['PRENOMCLIE'] ?>" required>
                </label>
                <label>Adresse*
                    <input type="text" name="adresse" value="<?= $client['ADRESSECLIE'] ?>" required>
                </label>
                <label>Ville*
                    <input type="text" name="ville" value="<?= $client['VILLECLIE'] ?>" required>
                </label>
                <label>Code Postal*
                    <input type="text" name="codepostal" value="<?= $client['CODEPOSTALCLIE'] ?>" required>
                </label>
                <label>Titre*
                    <input type="text" name="titre" value="<?= $client['TITRECLIE'] ?>" required>
                </label>
                <label>Numéro de Téléphone*
                    <input type="text" name="nrotel" value="<?= $client['NROTELCLIE'] ?>" required>
                </label>
                <input type="submit" name="submit" value="Modifier les informations" id="ex">
            </form>
        </div>

<!-- Modèle de suppression -->
<button id="openModalBtn">Delete</button>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Etes-vous sûr de vouloir supprimer ce livreur ?</h2>
        <form method="POST" action="">
            <input type="hidden" name="client_id" value="<?= $client_id ?>">
            <input type="submit" name="delete" value="Delete" class="byebye">                
        </form>
    </div>
</div>


    <script src="./js/modal.js"></script>
    <!-- Ajoutez ici vos balises de script, liens vers des fichiers JS, etc. -->
</body>
</html>