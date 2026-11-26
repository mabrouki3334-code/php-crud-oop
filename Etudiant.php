<?php
require_once 'config.php';

class Etudiant {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouter($nom, $filiere) {
        $sql = "INSERT INTO etudiants (nom, filiere) VALUES (:nom, :filiere)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':nom' => $nom, ':filiere' => $filiere]);
    }

    public function getAll() {
        $sql = "SELECT * FROM etudiants ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function supprimer($id) {
        $sql = "DELETE FROM etudiants WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>
