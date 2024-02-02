
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/list.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Document</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="./index.php">acceuil</a></li>
            <li><a href="./livreur.php">livreur</a></li>
            <li><a href="./client.php">clients</a></li>
            <li><a href="./addpizz.php">ajouter une pizza</a></li>
            <li><a href="./inscriptionClient.php">inscription de Client</a></li>
            <li><a href="./inscriptionLivreur.php">inscription de Livreur</a></li>
        </ul>
    </header>
    <main>
        <?php
        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Include necessary files
        include_once("./src/data.inc.php");

        try {
            // Assume the database connection code is present in data.inc.php
            $stmt = $_bdd->prepare("SELECT * FROM pizza");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Display pizza details using data from the database
            foreach ($result as $pizza) {
                echo "
                <section data-uid=" . $pizza['NROPIZZ'] . ">
                    <div class=\"left\">
                        <img src=\"" . $pizza['URLPIZZ'] . "\" class=\"zeb\">
                    </div>
                    <ul class=\"right\">
                        <li>  <p class=\"mail\">" . $pizza['DESIGNPIZZ'] . "</p> </li>
                        <li>  <p class=\"phone\">" . $pizza['TARIFPIZZ'] . "</p> </li>
                    </ul>
                    <a href=\"modifierP.php?NROPIZZ=" . $pizza['NROPIZZ'] . "\">modifier</a>
                </section>
            ";
            }   
        } catch (Exception $e) {
            // Print more debug information
            echo "Error: " . $e->getMessage();
        }
        ?>
    </main>
    <script src="js/app.js"></script>
</body>
</html>
