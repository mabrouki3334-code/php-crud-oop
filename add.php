<?php
require_once 'Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $filiere = trim($_POST['filiere']);
    
    if (!empty($nom) && !empty($filiere)) {
        $etudiant = new Etudiant($pdo);
        $etudiant->ajouter($nom, $filiere);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvel Étudiant</title>
</head>
<body>
    <h2>Ajouter un Étudiant</h2>
    <form method="POST" action="">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Filière :</label><br>
        <select name="filiere" required>
            <option value="">-- Choisir --</option>
            <option value="DSI">Développement des Systèmes Informatiques (DSI)</option>
            <option value="GI">Génie Informatique</option>
        </select><br><br>

        <button type="submit">Enregistrer</button>
    </form>
    <br>
    <a href="index.php">Retour à la liste</a>
</body>
</html>
