<?php
include_once("./src/data.inc.php");

if (isset($_POST['delete'])) {
    try {
        $_bdd->beginTransaction();
        $_bdd->exec('SET foreign_key_checks = 0');

        $deleteClientQuery = $_bdd->prepare("DELETE FROM client WHERE NROCLIE = :id");
        $deleteClientQuery->bindParam(':id', $_POST['client_id'], PDO::PARAM_INT);
        $deleteClientQuery->execute();

        $_bdd->exec('SET foreign_key_checks = 1');

        $_bdd->commit();
        header("Location: client.php"); 
        exit;
    } catch (Exception $e) {

        $_bdd->rollBack();
        echo "Erreur générale lors de la suppression : " . $e->getMessage();
    }
}
?>
