<?php

namespace App\Entity;

use App\Repository\LsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LsRepository::class)]
class Ls
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficiaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ipadd = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vlan = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $masque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeneficiaire(): ?string
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?string $beneficiaire): static
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    public function getIpadd(): ?string
    {
        return $this->ipadd;
    }

    public function setIpadd(?string $ipadd): static
    {
        $this->ipadd = $ipadd;

        return $this;
    }

    public function getVlan(): ?string
    {
        return $this->vlan;
    }

    public function setVlan(?string $vlan): static
    {
        $this->vlan = $vlan;

        return $this;
    }

    public function getMasque(): ?string
    {
        return $this->masque;
    }

    public function setMasque(?string $masque): static
    {
        $this->masque = $masque;

        return $this;
    }
}
