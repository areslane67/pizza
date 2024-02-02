<?php
include_once("./src/data.inc.php");

if (isset($_POST['add'])) {
    $add_query = $_bdd->prepare("
        INSERT INTO livreur (NOMLIVR, PRENOMLIVR, DATEEMBAUCHLIVR)
        VALUES (:nom, :prenom, :dateembauche)
    ");

    $add_query->execute([
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':dateembauche' => $_POST['dateembauche']
    ]);

    header("Location: livreur.php");
    exit;
}
?>