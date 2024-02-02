<?php
include_once("./src/data.inc.php");

if (isset($_POST['delete']) && isset($_POST['pizza_id'])) {
    $pizza_id_to_delete = $_POST['pizza_id'];

    try {
        $_bdd->exec('SET foreign_key_checks = 0');

        $deleteComposerQuery = $_bdd->prepare("DELETE FROM composer WHERE NROPIZZ = :id");
        $deleteComposerQuery->bindParam(':id', $pizza_id_to_delete, PDO::PARAM_INT);
        $deleteComposerQuery->execute();

        $deletePizzaQuery = $_bdd->prepare("DELETE FROM pizza WHERE NROPIZZ = :id");
        $deletePizzaQuery->bindParam(':id', $pizza_id_to_delete, PDO::PARAM_INT);

        if ($deletePizzaQuery->execute()) {
            $_bdd->exec('SET foreign_key_checks = 1');

            header("Location: index.php");
            exit;
        } else {
            echo "Erreur lors de la suppression de la pizza.";
        }
    } catch (PDOException $e) {
        $_bdd->exec('SET foreign_key_checks = 1');

        echo "Erreur PDO : " . $e->getMessage();
    }
}
?>
