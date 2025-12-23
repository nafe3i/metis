<?php



class Membre
{
    private ?int $id = null;
    private string $nom;
    private string $prenom;
    private string $email;

    public function __construct(string $nom, string $prenom, string $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getEmail(): string { return $this->email; }

    // Setter ID
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
?>