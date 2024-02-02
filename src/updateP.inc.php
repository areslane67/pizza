<?php
include_once("./src/data.inc.php");

if (isset($_GET['NROPIZZ'])) {
    $pizza_id = $_GET['NROPIZZ'];

    $pizza_query = $_bdd->prepare("SELECT * FROM pizza WHERE NROPIZZ = ?");
    $pizza_query->execute([$pizza_id]);
    $pizza = $pizza_query->fetch();

    if (isset($_POST['submit'])) {
        $update_query = $_bdd->prepare("
            UPDATE pizza
            SET DESIGNPIZZ = :design, TARIFPIZZ = :tarif, URLPIZZ = :url
            WHERE NROPIZZ = :pizza_id
        ");

        $update_query->execute([
            ':design' => $_POST['design'],
            ':tarif' => $_POST['tarif'],
            ':url' => $_POST['url'],
            ':pizza_id' => $pizza_id
        ]);

        header("Location: pizza.php?NROPIZZ=$pizza_id");
        exit;
    }
} else {
    echo "ID de la pizza non fourni.";
    exit;
}
?>
