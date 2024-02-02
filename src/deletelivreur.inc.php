<?php
include_once("./src/data.inc.php");

if (isset($_POST['delete'])) {
    try {
        // Désactivez la vérification des clés étrangères
        $_bdd->exec('SET foreign_key_checks = 0');

        // Supprimez le livreur
        $deleteLivreurQuery = $_bdd->prepare("DELETE FROM livreur WHERE NROLIVR = :id");
        $deleteLivreurQuery->bindParam(':id', $_GET['NROLIVR'], PDO::PARAM_INT);
        
        if ($deleteLivreurQuery->execute()) {
            // Réactivez la vérification des clés étrangères
            $_bdd->exec('SET foreign_key_checks = 1');

            header("Location: livreur.php");
            exit;
        } else {
            // En cas d'erreur, réactivez la vérification des clés étrangères
            $_bdd->exec('SET foreign_key_checks = 1');
            echo "Erreur lors de la suppression du livreur.";
        }
    } catch (Exception $e) {
        // En cas d'exception, réactivez la vérification des clés étrangères
        $_bdd->exec('SET foreign_key_checks = 1');
        echo "Erreur générale lors de la suppression : " . $e->getMessage();
    }
}
?>
