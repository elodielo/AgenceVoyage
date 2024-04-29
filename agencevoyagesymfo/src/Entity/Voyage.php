<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoyageRepository::class)]
class Voyage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombreNuits = null;

    #[ORM\Column(nullable: true)]
    private ?bool $repasCompris = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixTotal = null;

    #[ORM\Column(nullable: true)]
    private ?bool $transportADestinationInclus = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFin = null;


    #[ORM\ManyToOne(inversedBy: 'voyages')]
    private ?Endroit $endroit = null;

    #[ORM\ManyToOne(inversedBy: 'voyages')]
    private ?ModaliteTransport $modaliteTransport = null;

    #[ORM\ManyToOne(inversedBy: 'voyages')]
    private ?ModaliteNuit $modaliteNuit = null;

    /**
     * @var Collection<int, ContactResa>
     */
    #[ORM\OneToMany(targetEntity: ContactResa::class, mappedBy: 'voyage')]
    private Collection $contactResa;

    #[ORM\ManyToOne(inversedBy: 'voyages')]
    private ?User $user = null;

    public function __construct()
    {
        $this->contactResa = new ArrayCollection();
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

    public function getNombreNuits(): ?int
    {
        return $this->nombreNuits;
    }

    public function setNombreNuits(?int $nombreNuits): static
    {
        $this->nombreNuits = $nombreNuits;

        return $this;
    }

    public function isRepasCompris(): ?bool
    {
        return $this->repasCompris;
    }

    public function setRepasCompris(?bool $repasCompris): static
    {
        $this->repasCompris = $repasCompris;

        return $this;
    }

    public function getPrixTotal(): ?int
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(?int $prixTotal): static
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function isTransportADestinationInclus(): ?bool
    {
        return $this->transportADestinationInclus;
    }

    public function setTransportADestinationInclus(?bool $transportADestinationInclus): static
    {
        $this->transportADestinationInclus = $transportADestinationInclus;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }


    public function getEndroit(): ?Endroit
    {
        return $this->endroit;
    }

    public function setEndroit(?Endroit $endroit): static
    {
        $this->endroit = $endroit;

        return $this;
    }

    public function getModaliteTransport(): ?ModaliteTransport
    {
        return $this->modaliteTransport;
    }

    public function setModaliteTransport(?ModaliteTransport $modaliteTransport): static
    {
        $this->modaliteTransport = $modaliteTransport;

        return $this;
    }

    public function getModaliteNuit(): ?ModaliteNuit
    {
        return $this->modaliteNuit;
    }

    public function setModaliteNuit(?ModaliteNuit $modaliteNuit): static
    {
        $this->modaliteNuit = $modaliteNuit;

        return $this;
    }

    /**
     * @return Collection<int, ContactResa>
     */
    public function getContactResa(): Collection
    {
        return $this->contactResa;
    }

    public function addContactResa(ContactResa $contactResa): static
    {
        if (!$this->contactResa->contains($contactResa)) {
            $this->contactResa->add($contactResa);
            $contactResa->setVoyage($this);
        }

        return $this;
    }

    public function removeContactResa(ContactResa $contactResa): static
    {
        if ($this->contactResa->removeElement($contactResa)) {
            // set the owning side to null (unless already changed)
            if ($contactResa->getVoyage() === $this) {
                $contactResa->setVoyage(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
