<?php

// Vérifiez si l'ID du livreur est présent dans l'URL
if (isset($_GET['NROLIVR'])) {
    $livreur_id = $_GET['NROLIVR'];

    // Récupérez les détails du livreur en fonction de l'ID
    $livreur_query = $_bdd->prepare("SELECT * FROM livreur WHERE NROLIVR = ?");
    $livreur_query->execute([$livreur_id]);
    $livreur = $livreur_query->fetch();

    // Vérifiez si le formulaire de mise à jour a été soumis
    if (isset($_POST['submit'])) {
        // Mettez à jour les informations du livreur
        // Assurez-vous de remplacer les noms de colonnes par les vrais noms de votre table
        $update_query = $_bdd->prepare("
            UPDATE livreur
            SET NOMLIVR = :nom, PRENOMLIVR = :prenom, DATEEMBAUCHLIVR = :date_embauche
            WHERE NROLIVR = :livreur_id
        ");

        // Exécutez la requête de mise à jour en utilisant les valeurs soumises dans le formulaire
        $update_query->execute([
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':date_embauche' => $_POST['date_embauche'],
            ':livreur_id' => $livreur_id
        ]);

        // Redirigez l'utilisateur vers la page de détails du livreur mis à jour
        header("Location: modifierL.php?NROLIVR=$livreur_id");
        exit;
    }
} else {
    // Si l'ID du livreur n'est pas présent dans l'URL, affichez un message d'erreur
    echo "ID du livreur non fourni.";
    exit;
}
?>