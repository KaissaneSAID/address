<?php

namespace App\Entity;

use App\Repository\PlanAddressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanAddressRepository::class)]
class PlanAddress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $masque = null;

    #[ORM\Column(nullable: true)]
    private ?string $debut = null;

    #[ORM\Column(nullable: true)]
    private ?string $fin = null;

    #[ORM\Column(nullable: true)]
    private ?string $idIP = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $receveurclient = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vlan = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getMasque(): ?string
    {
        return $this->masque;
    }

    public function setMasque(string $masque): static
    {
        $this->masque = $masque;

        return $this;
    }

    public function getDebut(): ?string
    {
        return $this->debut;
    }

    public function setDebut(?string $debut): static
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?string
    {
        return $this->fin;
    }

    public function setFin(?string $fin): static
    {
        $this->fin = $fin;

        return $this;
    }

    public function getIdIP(): ?string
    {
        return $this->idIP;
    }

    public function setIdIP(?string $idIP): static
    {
        $this->idIP = $idIP;

        return $this;
    }

    public function getReceveurclient(): ?string
    {
        return $this->receveurclient;
    }

    public function setReceveurclient(?string $receveurclient): static
    {
        $this->receveurclient = $receveurclient;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
