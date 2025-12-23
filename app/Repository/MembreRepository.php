<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Entity/Membre.php';

class MembreRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    // Ajouter un membre
    public function create(Membre $membre): int
    {
        $sql = "INSERT INTO membres (nom, prenom, email)
                VALUES (:nom, :prenom, :email)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nom' => $membre->getNom(),
            'prenom' => $membre->getPrenom(),
            'email' => $membre->getEmail()
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    // liste membre

    public function findAll(): array
    {
        return $this->pdo
            ->query("SELECT * FROM membres")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Verifier si email existe
    public function emailExists(string $email): bool
    {
        $sql = "SELECT id FROM membres WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        return (bool) $stmt->fetch();
    }

    // Supprimer un membre
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM membres WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }

    // Vérifier si le membre possède des projets
    public function hasProjets(int $membreId): bool
    {
        $sql = "SELECT COUNT(*) FROM projets WHERE membre_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $membreId]);

        return $stmt->fetchColumn() > 0;
    }

}

?>