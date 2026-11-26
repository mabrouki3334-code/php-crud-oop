<?php
require_once 'Etudiant.php';

if (isset($_GET['delete'])) {
    $etudiant = new Etudiant($pdo);
    $etudiant->supprimer($_GET['delete']);
    header("Location: index.php");
    exit;
}

$etudiantObj = new Etudiant($pdo);
$liste = $etudiantObj->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; margin-top: 20px; width: 60%; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Liste des Étudiants</h2>
    <a href="add.php">+ Ajouter un étudiant</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom Complet</th>
            <th>Filière</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($liste as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nom']) ?></td>
            <td><?= htmlspecialchars($row['filiere']) ?></td>
            <td>
                <a href="index.php?delete=<?= $row['id'] ?>" onclick="return confirm('T\'as vraiment envie de supprimer ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
