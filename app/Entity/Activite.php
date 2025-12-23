<?php
/*

class Activite
{
    private ?int $id = null;
    private string $titre;
    private string $description;
    private string $dateActivite;
    private int $projetId; // FK vers Projet
    private ?string $createdAt = null;

    public function __construct(string $titre, string $dateActivite, int $projetId, ?string $description = null)
    {
        $this->titre = $titre;
        $this->dateActivite = $dateActivite;
        $this->projetId = $projetId;
        $this->description = $description;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getProjetId(): int
    {
        return $this->projetId;
    }
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

}*/
///////////////////////////////////////////////:

class Activite
{
    private ?int $id = null;
    private string $titre;
    private ?string $description;
    private string $dateActivite;
    private int $projetId;

    public function __construct(
        string $titre,
        ?string $description,
        string $dateActivite,
        int $projetId
    ) {
        $this->titre = $titre;
        $this->description = $description;
        $this->dateActivite = $dateActivite;
        $this->projetId = $projetId;
    }

    public function getId(): ?int { return $this->id; }
    public function getTitre(): string { return $this->titre; }
    public function getDescription(): ?string { return $this->description; }
    public function getDateActivite(): string { return $this->dateActivite; }
    public function getProjetId(): int { return $this->projetId; }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
?>
