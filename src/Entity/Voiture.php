<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column]
    private ?int $km = null;

    #[ORM\Column(length: 255)]
    private ?string $image_principale = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $galerie_image = null;

    #[ORM\Column]
    private ?bool $est_vendu = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_publication = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $caracteristique = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $equipements = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    private ?Modele $modele = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    private ?Garage $garage = null;

    #[ORM\PrePersist]
    public function setCreatedAtValue()
    {
        $this->date_publication = new \DateTimeImmutable();
    }

    public function __toString(): string
    {
        return $this->Titre;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): static
    {
        $this->km = $km;

        return $this;
    }

    public function getImagePrincipale(): ?string
    {
        return $this->image_principale;
    }

    public function setImagePrincipale(string $image_principale): static
    {
        $this->image_principale = $image_principale;

        return $this;
    }

    public function getGalerieImage(): ?array
    {
        return $this->galerie_image;
    }

    public function setGalerieImage(?array $galerie_image): static
    {
        $this->galerie_image = $galerie_image;

        return $this;
    }

    public function isEstVendu(): ?bool
    {
        return $this->est_vendu;
    }

    public function setEstVendu(bool $est_vendu): static
    {
        $this->est_vendu = $est_vendu;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeImmutable
    {
        return $this->date_publication;
    }

    public function setDatePublication(\DateTimeImmutable $date_publication): static
    {
        $this->date_publication = $date_publication;

        return $this;
    }

    public function getCaracteristique(): ?array
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(?array $caracteristique): static
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getEquipements(): ?array
    {
        return $this->equipements;
    }

    public function setEquipements(?array $equipements): static
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): static
    {
        $this->garage = $garage;

        return $this;
    }
}
