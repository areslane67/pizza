<?php
include_once("./src/data.inc.php");

// Vérifiez si le formulaire d'ajout a été soumis
if (isset($_POST['add'])) {
    // Ajoutez les informations du nouveau livreur dans la base de données
    // Assurez-vous de remplacer les noms de colonnes par les vrais noms de votre table
    $add_query = $_bdd->prepare("
        INSERT INTO livreur (NOMLIVR, PRENOMLIVR, DATEEMBAUCHLIVR)
        VALUES (:nom, :prenom, :dateembauche)
    ");

    // Exécutez la requête d'ajout en utilisant les valeurs soumises dans le formulaire
    $add_query->execute([
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':dateembauche' => $_POST['dateembauche']
    ]);

    // Redirigez l'utilisateur vers la page de détails du nouveau livreur
    // Vous pouvez remplacer cette URL par celle que vous souhaitez rediriger l'utilisateur
    header("Location: livreur.php");
    exit;
}
?>