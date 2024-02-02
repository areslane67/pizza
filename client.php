
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
        include_once("./src/deleteclient.inc.php");


        try {
            $stmt = $_bdd->prepare("SELECT * FROM client");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $client) {
                echo "
                <section data-uid=" . $client['NROCLIE'] . ">
                    <ul class=\"right\">
                        <li>  <p class=\"nom\">" . $client['NOMCLIE'] . "</p> </li>
                        <li>  <p class=\"prenom\">" . $client['PRENOMCLIE'] . "</p> </li>
                        <li>  <p class=\"adresse\">" . $client['ADRESSECLIE'] . "</p> </li>
                        <li>  <p class=\"ville\">" . $client['VILLECLIE'] . "</p> </li>
                        <li>  <p class=\"code\">" . $client['CODEPOSTALCLIE'] . "</p> </li>
                        <li>  <p class=\"titre\">" . $client['TITRECLIE'] . "</p> </li>
                        <li>  <p class=\"phone\">" . $client['NROTELCLIE'] . "</p> </li>
                    </ul>
                    <a href=\"modifierC.php?NROCLIE=" . $client['NROCLIE'] . "\">modifier</a>
                    
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
