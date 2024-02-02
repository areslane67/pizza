<?php
include_once("./src/data.inc.php");
include_once("./src/updateL.inc.php");
include_once("./src/deletelivreur.inc.php");


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

    <title>Modifier Livreur</title>
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


        <div class="ez">
        <section data-uid="<?= $livreur_id ?>">
            <ul class="right">
                <li><p class="mail"><?= $livreur['NOMLIVR'] ?></p></li>
                <li><p class="phone"><?= $livreur['PRENOMLIVR'] ?></p></li>
                <li><p class="phone"><?= $livreur['DATEEMBAUCHLIVR'] ?></p></li>
            </ul>
        </section>
        <h1>Modifier profil du livreur</h1>

            <form method="POST" action="">
                <label>Nom
                    <input type="text" name="nom" value="<?= $livreur['NOMLIVR'] ?>" required>
                </label>
                <label>Prénom
                    <input type="text" name="prenom" value="<?= $livreur['PRENOMLIVR'] ?>" required>
                </label>
                <label>Date d'embauche
                    <input type="date" name="date_embauche" value="<?= $livreur['DATEEMBAUCHLIVR'] ?>" required>
                </label>
                <input type="submit" name="submit" value="Modifier les informations" id="ex">
            </form>
        </div>

        <button id="openModalBtn">Delete</button>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Etes-vous sûr de vouloir supprimer ce livreur ?</h2>
                <form method="POST" action="">
                    <input type="hidden" name="livreur_id" value="<?php echo $result[0]['NROLIVR']; ?>">
                    <input type="submit" name="delete" value="Delete" class="byebye">                
                </form>
            </div>
        </div>

    </main>
    <script src="./js/modal.js"></script>
</body>
</html>
