<?php

require_once __DIR__ . '/../Repository/ActiviteRepository.php';

class ActiviteService
{
    private ActiviteRepository $activiteRepo;

    public function __construct()
    {
        $this->activiteRepo = new ActiviteRepository();
    }

    // Ajouter activite
    public function ajouterActivite(Activite $activite): void
    {
        $this->activiteRepo->create($activite);
    }

    // Modifier activite
    public function modifierActivite(
        int $id,
        string $titre,
        ?string $description,
        string $date
    ): void {
        $this->activiteRepo->update($id, $titre, $description, $date);
    }

    // Supprimer activite
    public function supprimerActivite(int $id): void
    {
        $this->activiteRepo->delete($id);
    }

    // Historique 
    public function historiqueProjet(int $projetId): array
    {
        return $this->activiteRepo->findByProjet($projetId);
    }
}
?>