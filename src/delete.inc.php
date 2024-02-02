<?php
include_once("./src/data.inc.php");

// Vérifie si l'ID de la pizza est passé dans la requête POST
if (isset($_POST['delete']) && isset($_POST['pizza_id'])) {
    // Récupère l'ID de la pizza depuis la requête POST
    $pizza_id_to_delete = $_POST['pizza_id'];

    try {
        // Désactiver temporairement les contraintes d'intégrité référentielle
        $_bdd->exec('SET foreign_key_checks = 0');

        // 1. Supprimer les enregistrements correspondants dans la table "composer"
        $deleteComposerQuery = $_bdd->prepare("DELETE FROM composer WHERE NROPIZZ = :id");
        $deleteComposerQuery->bindParam(':id', $pizza_id_to_delete, PDO::PARAM_INT);
        $deleteComposerQuery->execute();

        // 2. Supprimer la pizza elle-même
        $deletePizzaQuery = $_bdd->prepare("DELETE FROM pizza WHERE NROPIZZ = :id");
        $deletePizzaQuery->bindParam(':id', $pizza_id_to_delete, PDO::PARAM_INT);

        if ($deletePizzaQuery->execute()) {
            // Réactiver les contraintes d'intégrité référentielle
            $_bdd->exec('SET foreign_key_checks = 1');

            // Redirige vers la page de liste des pizzas après la suppression
            header("Location: index.php");
            exit;
        } else {
            echo "Erreur lors de la suppression de la pizza.";
        }
    } catch (PDOException $e) {
        // Réactiver les contraintes d'intégrité référentielle en cas d'erreur
        $_bdd->exec('SET foreign_key_checks = 1');

        echo "Erreur PDO : " . $e->getMessage();
    }
}
// Le reste de votre code pour afficher les détails de la pizza...
?>
