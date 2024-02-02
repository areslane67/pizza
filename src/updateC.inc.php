<?php
include_once("./src/data.inc.php");


// Vérifiez si l'ID du client est présent dans l'URL
if (isset($_GET['NROCLIE'])) {
    $client_id = $_GET['NROCLIE'];

    // Récupérez les détails du client en fonction de l'ID
    $client_query = $_bdd->prepare("SELECT * FROM client WHERE NROCLIE = ?");
    $client_query->execute([$client_id]);
    $client = $client_query->fetch();

    if (isset($_POST['submit'])) {
        $update_query = $_bdd->prepare("
            UPDATE client
            SET NOMCLIE = :nom, PRENOMCLIE = :prenom, ADRESSECLIE = :adresse, VILLECLIE = :ville, CODEPOSTALCLIE = :codepostal, TITRECLIE = :titre, NROTELCLIE = :nrotel
            WHERE NROCLIE = :client_id
        ");

        $update_query->execute([
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':adresse' => $_POST['adresse'],
            ':ville' => $_POST['ville'],
            ':codepostal' => $_POST['codepostal'],
            ':titre' => $_POST['titre'],
            ':nrotel' => $_POST['nrotel'],
            ':client_id' => $client_id
        ]);

        header("Location: modifierC.php?NROCLIE=$client_id");
        exit;
    }
} else {
    echo "ID du client non fourni.";
    exit;
}
?>