<?php
include_once("./src/data.inc.php");

// Vérifiez si le formulaire d'ajout a été soumis
if (isset($_POST['add'])) {
    // Ajoutez les informations du nouveau client dans la base de données
    // Assurez-vous de remplacer les noms de colonnes par les vrais noms de votre table
    $add_query = $_bdd->prepare("
        INSERT INTO client (NOMCLIE, PRENOMCLIE, ADRESSECLIE, VILLECLIE, CODEPOSTALCLIE, TITRECLIE, NROTELCLIE)
        VALUES (:nom, :prenom, :adresse, :ville, :codepostal, :titre, :nrotel)
    ");

    // Exécutez la requête d'ajout en utilisant les valeurs soumises dans le formulaire
    $add_query->execute([
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':adresse' => $_POST['adresse'],
        ':ville' => $_POST['ville'],
        ':codepostal' => $_POST['codepostal'],
        ':titre' => $_POST['titre'],
        ':nrotel' => $_POST['nrotel']
    ]);

    // Redirigez l'utilisateur vers la page de détails du nouveau client
    // Vous pouvez remplacer cette URL par celle que vous souhaitez rediriger l'utilisateur
    header("Location: client.php");
    exit;
}
?>