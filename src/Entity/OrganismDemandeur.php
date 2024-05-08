<?php

namespace App\Entity;

use App\Repository\OrganismDemandeurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganismDemandeurRepository::class)]
class OrganismDemandeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomCommplet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sigle = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $BPostal = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $Fjuridique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommplet(): ?string
    {
        return $this->nomCommplet;
    }

    public function setNomCommplet(?string $nomCommplet): static
    {
        $this->nomCommplet = $nomCommplet;

        return $this;
    }

    public function getSigle(): ?string
    {
        return $this->sigle;
    }

    public function setSigle(?string $sigle): static
    {
        $this->sigle = $sigle;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getBPostal(): ?string
    {
        return $this->BPostal;
    }

    public function setBPostal(?string $BPostal): static
    {
        $this->BPostal = $BPostal;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getFjuridique(): ?string
    {
        return $this->Fjuridique;
    }

    public function setFjuridique(string $Fjuridique): static
    {
        $this->Fjuridique = $Fjuridique;

        return $this;
    }
}
