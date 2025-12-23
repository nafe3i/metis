<?php

require_once __DIR__ . '/Projet.php';

class ProjetCourt extends Projet
{
    public function __construct(string $titre, ?string $description, int $membreId)
    {
        parent::__construct($titre, $description, $membreId);
        $this->type = 'court';
    }
}

?>