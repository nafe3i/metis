<?php
abstract class Projet
{
    protected ?int $id = null;
    protected string $titre;
    protected ?string $description;
    protected int $membreId;
    protected string $type;

    public function __construct(string $titre, ?string $description, int $membreId)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->membreId = $membreId;
    }

    public function getId(): ?int { return $this->id; }
    public function getTitre(): string { return $this->titre; }
    public function getDescription(): ?string { return $this->description; }
    public function getMembreId(): int { return $this->membreId; }
    public function getType(): string { return $this->type; }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
?>