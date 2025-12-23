<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Entity/Activite.php';

class ActiviteRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    // Ajouter activite
    public function create(Activite $activite): int
    {
        $sql = "INSERT INTO activites (titre, description, date_activite, projet_id)
                VALUES (:titre, :description, :date_activite, :projet_id)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'titre' => $activite->getTitre(),
            'description' => $activite->getDescription(),
            'date_activite' => $activite->getDateActivite(),
            'projet_id' => $activite->getProjetId()
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    // Modifier activite
    public function update(int $id, string $titre, ?string $description, string $date): bool
    {
        $sql = "UPDATE activites
                SET titre = :titre,
                    description = :description,
                    date_activite = :date
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'titre' => $titre,
            'description' => $description,
            'date' => $date,
            'id' => $id
        ]);
    }

    // Supprimer activite
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM activites WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }

    // Historique des activite un projet 
    public function findByProjet(int $projetId): array
    {
        $sql = "SELECT * FROM activites
                WHERE projet_id = :id
                ORDER BY date_activite DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $projetId]);

        return $stmt->fetchAll();
    }
}
?>