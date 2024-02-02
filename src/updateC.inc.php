<?php
include_once("./src/data.inc.php");


// Vérifiez si l'ID du client est présent dans l'URL
if (isset($_GET['NROCLIE'])) {
    $client_id = $_GET['NROCLIE'];

    // Récupérez les détails du client en fonction de l'ID
    $client_query = $_bdd->prepare("SELECT * FROM client WHERE NROCLIE = ?");
    $client_query->execute([$client_id]);
    $client = $client_query->fetch();

    // Vérifiez si le formulaire de mise à jour a été soumis
    if (isset($_POST['submit'])) {
        // Mettez à jour les informations du client
        // Assurez-vous de remplacer les noms de colonnes par les vrais noms de votre table
        $update_query = $_bdd->prepare("
            UPDATE client
            SET NOMCLIE = :nom, PRENOMCLIE = :prenom, ADRESSECLIE = :adresse, VILLECLIE = :ville, CODEPOSTALCLIE = :codepostal, TITRECLIE = :titre, NROTELCLIE = :nrotel
            WHERE NROCLIE = :client_id
        ");

        // Exécutez la requête de mise à jour en utilisant les valeurs soumises dans le formulaire
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

        // Redirigez l'utilisateur vers la page de détails du client mis à jour
        header("Location: modifierC.php?NROCLIE=$client_id");
        exit;
    }
} else {
    // Si l'ID du client n'est pas présent dans l'URL, affichez un message d'erreur
    echo "ID du client non fourni.";
    exit;
}
?>