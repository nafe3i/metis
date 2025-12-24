<?php

require_once __DIR__ . '/../Repository/MembreRepository.php';

class MembreService
{
    private MembreRepository $membreRepo;

    public function __construct()
    {
        $this->membreRepo = new MembreRepository();
    }

    public function createMembre(Membre $membre): void
    {
        if ($this->membreRepo->emailExists($membre->getEmail())) {
            throw new Exception("Email déjà utilisé");
        }

        $this->membreRepo->create($membre);
    }

    public function deleteMembre(int $id): void
    {
        if ($this->membreRepo->hasProjets($id)) {
            throw new Exception("Suppression impossible : membre lié à des projets");
        }

        $this->membreRepo->delete($id);
    }
}
