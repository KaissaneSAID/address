<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

   

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $localite = null;

    

    #[ORM\ManyToOne(inversedBy: 'IdTYpeconnexion')]
    private ?TypeConnexion $typeConnexion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contacts = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAttribue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NDossier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ipaddress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $masque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $passerelle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }  

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(?string $localite): static
    {
        $this->localite = $localite;

        return $this;
    }


    public function getTypeConnexion(): ?TypeConnexion
    {
        return $this->typeConnexion;
    }

    public function setTypeConnexion(?TypeConnexion $typeConnexion): static
    {
        $this->typeConnexion = $typeConnexion;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getContacts(): ?string
    {
        return $this->contacts;
    }

    public function setContacts(?string $contacts): static
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function getDateAttribue(): ?\DateTimeInterface
    {
        return $this->dateAttribue;
    }

    public function setDateAttribue(\DateTimeInterface $dateAttribue): static
    {
        $this->dateAttribue = $dateAttribue;

        return $this;
    }

    public function getNDossier(): ?string
    {
        return $this->NDossier;
    }

    public function setNDossier(?string $NDossier): static
    {
        $this->NDossier = $NDossier;

        return $this;
    }

    public function getIpaddress(): ?string
    {
        return $this->ipaddress;
    }

    public function setIpaddress(?string $ipaddress): static
    {
        $this->ipaddress = $ipaddress;

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

    public function getPasserelle(): ?string
    {
        return $this->passerelle;
    }

    public function setPasserelle(?string $passerelle): static
    {
        $this->passerelle = $passerelle;

        return $this;
    }
}
