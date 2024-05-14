<?php

namespace App\Entity;

use App\Repository\ContactResaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ContactResaRepository::class)]
class ContactResa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('api_contactResa_new')]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups('api_contactResa_new')]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    #[Groups('api_contactResa_new')]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Groups('api_contactResa_new')]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups('api_contactResa_new')]
    private ?string $commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'contactResa')]
    #[Groups('api_contactResa_new')]
    private ?Voyage $voyage = null;

    #[ORM\ManyToOne(inversedBy: 'contactResa')]
    #[Groups('api_contactResa_new')]
    private ?Statut $statut = null;



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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getVoyage(): ?Voyage
    {
        return $this->voyage;
    }

    public function setVoyage(?Voyage $voyage): static
    {
        $this->voyage = $voyage;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

}
