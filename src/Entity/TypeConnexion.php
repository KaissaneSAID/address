<?php

namespace App\Entity;

use App\Repository\TypeConnexionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeConnexionRepository::class)]
class TypeConnexion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Client::class, mappedBy: 'typeConnexion')]
    private Collection $IdTYpeconnexion;

    public function __construct()
    {
        $this->IdTYpeconnexion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getIdTYpeconnexion(): Collection
    {
        return $this->IdTYpeconnexion;
    }

    public function addIdTYpeconnexion(Client $idTYpeconnexion): static
    {
        if (!$this->IdTYpeconnexion->contains($idTYpeconnexion)) {
            $this->IdTYpeconnexion->add($idTYpeconnexion);
            $idTYpeconnexion->setTypeConnexion($this);
        }

        return $this;
    }

    public function removeIdTYpeconnexion(Client $idTYpeconnexion): static
    {
        if ($this->IdTYpeconnexion->removeElement($idTYpeconnexion)) {
            // set the owning side to null (unless already changed)
            if ($idTYpeconnexion->getTypeConnexion() === $this) {
                $idTYpeconnexion->setTypeConnexion(null);
            }
        }

        return $this;
    }
}
