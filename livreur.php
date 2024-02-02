
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/liste.css">
    <title>Document</title>
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
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include_once("./src/data.inc.php");


        try {
            $stmt = $_bdd->prepare("SELECT * FROM livreur");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $livreur) {
                echo "
                <section data-uid=" . $livreur['NROLIVR'] . ">
                    <ul class=\"right\">
                        <li>  <p class=\"nom\">" . $livreur['NOMLIVR'] . "</p> </li>
                        <li>  <p class=\"prenom\">" . $livreur['PRENOMLIVR'] . "</p> </li>
                        <li>  <p class=\"date\">" . $livreur['DATEEMBAUCHLIVR'] . "</p> </li>
                    </ul>
                    <a href=\"modifierL.php?NROLIVR=" . $livreur['NROLIVR'] . "\">modifier</a>
                    
                </section>
            ";
            }   
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </main>
</body>
</html>
