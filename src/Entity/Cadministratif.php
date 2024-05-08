<?php

namespace App\Entity;

use App\Repository\CadministratifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CadministratifRepository::class)]
class Cadministratif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomComplet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FonctionOrganisme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $TelFix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $TelMobil = null;

    #[ORM\Column(length: 255)]
    private ?string $adressEmail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->NomComplet;
    }

    public function setNomComplet(string $NomComplet): static
    {
        $this->NomComplet = $NomComplet;

        return $this;
    }

    public function getFonctionOrganisme(): ?string
    {
        return $this->FonctionOrganisme;
    }

    public function setFonctionOrganisme(?string $FonctionOrganisme): static
    {
        $this->FonctionOrganisme = $FonctionOrganisme;

        return $this;
    }

    public function getTelFix(): ?string
    {
        return $this->TelFix;
    }

    public function setTelFix(?string $TelFix): static
    {
        $this->TelFix = $TelFix;

        return $this;
    }

    public function getTelMobil(): ?string
    {
        return $this->TelMobil;
    }

    public function setTelMobil(?string $TelMobil): static
    {
        $this->TelMobil = $TelMobil;

        return $this;
    }

    public function getAdressEmail(): ?string
    {
        return $this->adressEmail;
    }

    public function setAdressEmail(string $adressEmail): static
    {
        $this->adressEmail = $adressEmail;

        return $this;
    }
}
