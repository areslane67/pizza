<?php
include_once("./src/data.inc.php");

if (isset($_POST['add'])) {
    $add_query = $_bdd->prepare("
        INSERT INTO client (NOMCLIE, PRENOMCLIE, ADRESSECLIE, VILLECLIE, CODEPOSTALCLIE, TITRECLIE, NROTELCLIE)
        VALUES (:nom, :prenom, :adresse, :ville, :codepostal, :titre, :nrotel)
    ");

    $add_query->execute([
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':adresse' => $_POST['adresse'],
        ':ville' => $_POST['ville'],
        ':codepostal' => $_POST['codepostal'],
        ':titre' => $_POST['titre'],
        ':nrotel' => $_POST['nrotel']
    ]);

    header("Location: client.php");
    exit;
}
?>