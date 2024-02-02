<?php
include_once("./src/data.inc.php");

// Vérifiez si le formulaire de création a été soumis
if (isset($_POST['create'])) {
    // Ajoutez les informations de la nouvelle pizza dans la base de données
    // Assurez-vous de remplacer les noms de colonnes par les vrais noms de votre table
    $create_query = $_bdd->prepare("
        INSERT INTO pizza (DESIGNPIZZ, TARIFPIZZ, URLPIZZ)
        VALUES (:design, :tarif, :url)
    ");

    // Exécutez la requête de création en utilisant les valeurs soumises dans le formulaire
    $create_query->execute([
        ':design' => $_POST['design'],
        ':tarif' => $_POST['tarif'],
        ':url' => $_POST['url']
    ]);

    // Redirigez l'utilisateur vers la page de détails de la nouvelle pizza
    // Vous pouvez remplacer cette URL par celle que vous souhaitez rediriger l'utilisateur
    header("Location: index.php");
    exit;
}
?>