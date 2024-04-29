<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Endroit>
     */
    #[ORM\OneToMany(targetEntity: Endroit::class, mappedBy: 'pays')]
    private Collection $endroit;

    public function __construct()
    {
        $this->endroit = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Endroit>
     */
    public function getEndroit(): Collection
    {
        return $this->endroit;
    }

    public function addEndroit(Endroit $endroit): static
    {
        if (!$this->endroit->contains($endroit)) {
            $this->endroit->add($endroit);
            $endroit->setPays($this);
        }

        return $this;
    }

    public function removeEndroit(Endroit $endroit): static
    {
        if ($this->endroit->removeElement($endroit)) {
            // set the owning side to null (unless already changed)
            if ($endroit->getPays() === $this) {
                $endroit->setPays(null);
            }
        }

        return $this;
    }
}
