<?php

namespace App\Entity;

use App\Repository\ModaliteTransportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModaliteTransportRepository::class)]
class ModaliteTransport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Voyage>
     */
    #[ORM\OneToMany(targetEntity: Voyage::class, mappedBy: 'modaliteTransport')]
    private Collection $voyages;

    public function __construct()
    {
        $this->voyages = new ArrayCollection();
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
     * @return Collection<int, Voyage>
     */
    public function getVoyages(): Collection
    {
        return $this->voyages;
    }

    public function addVoyage(Voyage $voyage): static
    {
        if (!$this->voyages->contains($voyage)) {
            $this->voyages->add($voyage);
            $voyage->setModaliteTransport($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): static
    {
        if ($this->voyages->removeElement($voyage)) {
            // set the owning side to null (unless already changed)
            if ($voyage->getModaliteTransport() === $this) {
                $voyage->setModaliteTransport(null);
            }
        }

        return $this;
    }
}
