<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups('api_contactResa_new')]
    private ?string $nom = null;

    /**
     * @var Collection<int, ContactResa>
     */
    #[ORM\OneToMany(targetEntity: ContactResa::class, mappedBy: 'statut')]
    private Collection $contactResa;

    /**
     * @var Collection<int, Contact>
     */
    #[ORM\OneToMany(targetEntity: Contact::class, mappedBy: 'statut')]
    private Collection $contact;

    public function __construct()
    {
        $this->contactResa = new ArrayCollection();
        $this->contact = new ArrayCollection();
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
            $contactResa->setStatut($this);
        }

        return $this;
    }

    public function removeContactResa(ContactResa $contactResa): static
    {
        if ($this->contactResa->removeElement($contactResa)) {
            // set the owning side to null (unless already changed)
            if ($contactResa->getStatut() === $this) {
                $contactResa->setStatut(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(Contact $contact): static
    {
        if (!$this->contact->contains($contact)) {
            $this->contact->add($contact);
            $contact->setStatut($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): static
    {
        if ($this->contact->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getStatut() === $this) {
                $contact->setStatut(null);
            }
        }

        return $this;
    }
}
