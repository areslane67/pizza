<?php
include_once("./src/data.inc.php");

if (isset($_POST['delete'])) {
    try {
        $_bdd->exec('SET foreign_key_checks = 0');

        $deleteLivreurQuery = $_bdd->prepare("DELETE FROM livreur WHERE NROLIVR = :id");
        $deleteLivreurQuery->bindParam(':id', $_GET['NROLIVR'], PDO::PARAM_INT);
        
        if ($deleteLivreurQuery->execute()) {
            $_bdd->exec('SET foreign_key_checks = 1');

            header("Location: livreur.php");
            exit;
        } else {
            $_bdd->exec('SET foreign_key_checks = 1');
            echo "Erreur lors de la suppression du livreur.";
        }
    } catch (Exception $e) {
        $_bdd->exec('SET foreign_key_checks = 1');
        echo "Erreur générale lors de la suppression : " . $e->getMessage();
    }
}
?>
