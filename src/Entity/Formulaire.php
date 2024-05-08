<?php

namespace App\Entity;

use App\Repository\FormulaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaireRepository::class)]
class Formulaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomDomaineComplet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pieceJustif = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filPiece = null;

    #[ORM\Column(length: 255)]
    private ?string $Facture = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?OrganismDemandeur $Organisme = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Cadministratif $Cadmini = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?CTechnique $Ctech = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDomaineComplet(): ?string
    {
        return $this->NomDomaineComplet;
    }

    public function setNomDomaineComplet(string $NomDomaineComplet): static
    {
        $this->NomDomaineComplet = $NomDomaineComplet;

        return $this;
    }

    public function getPieceJustif(): ?string
    {
        return $this->pieceJustif;
    }

    public function setPieceJustif(?string $pieceJustif): static
    {
        $this->pieceJustif = $pieceJustif;

        return $this;
    }

    public function getFilPiece(): ?string
    {
        return $this->filPiece;
    }

    public function setFilPiece(?string $filPiece): static
    {
        $this->filPiece = $filPiece;

        return $this;
    }

    public function getFacture(): ?string
    {
        return $this->Facture;
    }

    public function setFacture(string $Facture): static
    {
        $this->Facture = $Facture;

        return $this;
    }

    public function getOrganisme(): ?OrganismDemandeur
    {
        return $this->Organisme;
    }

    public function setOrganisme(?OrganismDemandeur $Organisme): static
    {
        $this->Organisme = $Organisme;

        return $this;
    }

    public function getCadmini(): ?Cadministratif
    {
        return $this->Cadmini;
    }

    public function setCadmini(?Cadministratif $Cadmini): static
    {
        $this->Cadmini = $Cadmini;

        return $this;
    }

    public function getCtech(): ?CTechnique
    {
        return $this->Ctech;
    }

    public function setCtech(?CTechnique $Ctech): static
    {
        $this->Ctech = $Ctech;

        return $this;
    }
}
