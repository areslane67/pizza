<?php
include_once("./src/data.inc.php");

if (isset($_POST['create'])) {

    $create_query = $_bdd->prepare("
        INSERT INTO pizza (DESIGNPIZZ, TARIFPIZZ, URLPIZZ)
        VALUES (:design, :tarif, :url)
    ");

    $create_query->execute([
        ':design' => $_POST['design'],
        ':tarif' => $_POST['tarif'],
        ':url' => $_POST['url']
    ]);

    header("Location: index.php");
    exit;
}
?>