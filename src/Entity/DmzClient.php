<?php

namespace App\Entity;

use App\Repository\DmzClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DmzClientRepository::class)]
class DmzClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $affectation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $addressIp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sousReseaux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $masque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vlan = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tailleSousReseau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAffectation(): ?string
    {
        return $this->affectation;
    }

    public function setAffectation(?string $affectation): static
    {
        $this->affectation = $affectation;

        return $this;
    }

    public function getAddressIp(): ?string
    {
        return $this->addressIp;
    }

    public function setAddressIp(?string $addressIp): static
    {
        $this->addressIp = $addressIp;

        return $this;
    }

    public function getSousReseaux(): ?string
    {
        return $this->sousReseaux;
    }

    public function setSousReseaux(?string $sousReseaux): static
    {
        $this->sousReseaux = $sousReseaux;

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

    public function getVlan(): ?string
    {
        return $this->vlan;
    }

    public function setVlan(?string $vlan): static
    {
        $this->vlan = $vlan;

        return $this;
    }

    public function getTailleSousReseau(): ?string
    {
        return $this->tailleSousReseau;
    }

    public function setTailleSousReseau(?string $tailleSousReseau): static
    {
        $this->tailleSousReseau = $tailleSousReseau;

        return $this;
    }
}
