<?php
include_once("./src/data.inc.php");

if (isset($_POST['delete'])) {
    try {
        // Commencez une transaction pour gérer les contraintes de clé étrangère
        $_bdd->beginTransaction();

        // Désactivez temporairement la contrainte de clé étrangère
        $_bdd->exec('SET foreign_key_checks = 0');

        // Supprimez le client de la table "client"
        $deleteClientQuery = $_bdd->prepare("DELETE FROM client WHERE NROCLIE = :id");
        $deleteClientQuery->bindParam(':id', $_POST['client_id'], PDO::PARAM_INT);
        $deleteClientQuery->execute();

        // Réactivez la contrainte de clé étrangère
        $_bdd->exec('SET foreign_key_checks = 1');

        // Validez la transaction si tout s'est bien passé
        $_bdd->commit();
        header("Location: client.php"); // Redirigez vers la liste des clients après suppression
        exit;
    } catch (Exception $e) {
        // En cas d'erreur, annulez la transaction
        $_bdd->rollBack();
        echo "Erreur générale lors de la suppression : " . $e->getMessage();
    }
}
?>
