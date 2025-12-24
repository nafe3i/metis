<?php

require_once __DIR__ . '/../Repository/ProjetRepository.php';

class ProjetService
{
    private ProjetRepository $projetRepo;

    public function __construct()
    {
        $this->projetRepo = new ProjetRepository();
    }

   
    public function createProjet(Projet $projet): void
    {
        $this->projetRepo->create($projet);
    }

    
    public function deleteProjet(int $id): void
    {
        
        if ($this->projetRepo->hasActivites($id)) {
            throw new Exception("Suppression impossible : activités en cours");
        }

        $this->projetRepo->delete($id);
    }
}
?>