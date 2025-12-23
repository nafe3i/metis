<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Entity/Projet.php';

class ProjetRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    // Ajouter un projet
    public function create(Projet $projet): int
    {
        $sql = "INSERT INTO projets (titre, description, type_proj, membre_id)
                VALUES (:titre, :description, :type, :membre_id)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'titre' => $projet->getTitre(),
            'description' => $projet->getDescription(),
            'type' => $projet->getType(),
            'membre_id' => $projet->getMembreId()
        ]);

        return (int) $this->pdo->lastInsertId();
    }



    // liste projet

    public function findAll(): array
    {
        return $this->pdo
            ->query("SELECT * FROM projets")
            ->fetchAll(PDO::FETCH_ASSOC);
    }
    // Vérifier si le projet a des activite
    public function hasActivites(int $projetId): bool
    {
        $sql = "SELECT COUNT(*) FROM activites WHERE projet_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $projetId]);

        return $stmt->fetchColumn() > 0;
    }

    // Supprimer projet
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM projets WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }
}
?>