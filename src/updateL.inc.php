<?php

// Vérifiez si l'ID du livreur est présent dans l'URL
if (isset($_GET['NROLIVR'])) {
    $livreur_id = $_GET['NROLIVR'];

    // Récupérez les détails du livreur en fonction de l'ID
    $livreur_query = $_bdd->prepare("SELECT * FROM livreur WHERE NROLIVR = ?");
    $livreur_query->execute([$livreur_id]);
    $livreur = $livreur_query->fetch();

    if (isset($_POST['submit'])) {
        $update_query = $_bdd->prepare("
            UPDATE livreur
            SET NOMLIVR = :nom, PRENOMLIVR = :prenom, DATEEMBAUCHLIVR = :date_embauche
            WHERE NROLIVR = :livreur_id
        ");

        $update_query->execute([
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':date_embauche' => $_POST['date_embauche'],
            ':livreur_id' => $livreur_id
        ]);

        header("Location: modifierL.php?NROLIVR=$livreur_id");
        exit;
    }
} else {
    echo "ID du livreur non fourni.";
    exit;
}
?>