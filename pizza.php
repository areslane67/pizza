<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/formulaire.css">
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
    <?php
        include_once("./src/data.inc.php");
        include_once("./src/delete.inc.php");

        // Check if NROPIZZ is set in the URL
        if (isset($_GET['NROPIZZ'])) {
            // Get the pizza ID from the URL
            $pizza_id = $_GET['NROPIZZ'];

// Fetch the pizza and ingredients data using a single query
$query = $_bdd->prepare("
    SELECT p.NROPIZZ, p.DESIGNPIZZ, p.TARIFPIZZ, p.URLPIZZ, i.NOMINGR
    FROM pizza p
    LEFT JOIN composer c ON p.NROPIZZ = c.NROPIZZ
    LEFT JOIN ingredient i ON c.CODEINGR = i.CODEINGR
    WHERE p.NROPIZZ = ?
");
$query->execute([$pizza_id]);


            // Check if the query was successful
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                // Display the pizza details
                echo "
                    <section data-uid=" . $result[0]['NROPIZZ'] . ">
                        <div class=\"left\">
                            <img src=\"" . $result[0]['URLPIZZ'] . "\" class=\"zeb\">
                        </div>
                        <ul class=\"right\">
                            <li>  <p class=\"mail\">" . $result[0]['DESIGNPIZZ'] . "</p> </li>
                            <li>  <p class=\"phone\">" . $result[0]['TARIFPIZZ'] . "</p> </li>
                        </ul>
                    </section>
                ";

                // Display the ingredients
                echo "<h3>Ingredients:</h3>";
                echo "<ul>";
                foreach ($result as $row) {
                    if (isset($row['NOMINGR'])) {
                        echo "<li>" . $row['NOMINGR'] . "</li>";
                    } else {
                        echo "<li>Ingredient name not available</li>";
                    }
                }
                echo "</ul>";
            } else {
                // Handle the case where the pizza with the given ID was not found
                echo "Pizza not found.";
            }
        } else {
            // Handle the case where NROPIZZ is not set in the URL
            echo "Pizza ID not provided.";
        }
        
    ?>
        <button id="openModalBtn">Delete</button>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Etes-vous sûr de vouloir supprimer ce livreur ?</h2>
                <form method="POST" action="">
                    <input type="hidden" name="pizza_id" value="<?php echo $result[0]['NROPIZZ']; ?>">
                    <input type="submit" name="delete" value="Delete" class="byebye">                
                </form>
            </div>
        </div>

    </main>
    <script src="./js/modal.js"></script>

</body>
</html>
