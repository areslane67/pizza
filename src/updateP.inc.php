<?php
include_once("./src/data.inc.php");

// Vérifiez si l'ID de la pizza est présent dans l'URL
if (isset($_GET['NROPIZZ'])) {
    $pizza_id = $_GET['NROPIZZ'];

    // Récupérez les détails de la pizza en fonction de l'ID
    $pizza_query = $_bdd->prepare("SELECT * FROM pizza WHERE NROPIZZ = ?");
    $pizza_query->execute([$pizza_id]);
    $pizza = $pizza_query->fetch();

    // Vérifiez si le formulaire de mise à jour a été soumis
    if (isset($_POST['submit'])) {
        // Mettez à jour les informations de la pizza
        // Assurez-vous de remplacer les noms de colonnes par les vrais noms de votre table
        $update_query = $_bdd->prepare("
            UPDATE pizza
            SET DESIGNPIZZ = :design, TARIFPIZZ = :tarif, URLPIZZ = :url
            WHERE NROPIZZ = :pizza_id
        ");

        // Exécutez la requête de mise à jour en utilisant les valeurs soumises dans le formulaire
        $update_query->execute([
            ':design' => $_POST['design'],
            ':tarif' => $_POST['tarif'],
            ':url' => $_POST['url'],
            ':pizza_id' => $pizza_id
        ]);

        // Redirigez l'utilisateur vers la page de détails de la pizza mise à jour
        header("Location: pizza.php?NROPIZZ=$pizza_id");
        exit;
    }
} else {
    // Si l'ID de la pizza n'est pas présent dans l'URL, affichez un message d'erreur
    echo "ID de la pizza non fourni.";
    exit;
}
?>
