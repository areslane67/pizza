<?php
include_once("./src/data.inc.php");
include_once("./src/updateP.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/formulaire.css">
    <link rel="stylesheet" href="./css/modif.css">
    <title>Modifier Pizza</title>
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
        <section data-uid="<?= $pizza_id ?>">
            <div class="left">
                <img src="<?= $pizza['URLPIZZ'] ?>" class="zeb">
            </div>
            <ul class="right">
                <li><p class="mail"><?= $pizza['DESIGNPIZZ'] ?></p></li>
                <li><p class="phone"><?= $pizza['TARIFPIZZ'] ?></p></li>
            </ul>
        </section>

        <div class="ez">
            <h1>Modifier profil de la pizza</h1>
            <form method="POST" action="">
                <label>Nom
                    <input type="text" name="design" value="<?= $pizza['DESIGNPIZZ'] ?>" required>
                </label>
                <label>Tarif
                    <input type="text" name="tarif" value="<?= $pizza['TARIFPIZZ'] ?>" required>
                </label>
                <label>URL de la photo
                    <input type="url" name="url" value="<?= $pizza['URLPIZZ'] ?>" required>
                </label>
                <input type="submit" name="submit" value="Modifier les informations" id="ex">
            </form>
        </div>


    </main>
</body>
</html>
