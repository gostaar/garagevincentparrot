<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $jour = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $am = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $pm = null;

    #[ORM\ManyToOne(inversedBy: 'horaires')]
    private ?Garage $garage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?array
    {
        return $this->jour;
    }

    public function setJour(?array $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getAm(): ?array
    {
        return $this->am;
    }

    public function setAm(?array $am): static
    {
        $this->am = $am;

        return $this;
    }

    public function getPm(): ?array
    {
        return $this->pm;
    }

    public function setPm(?array $pm): static
    {
        $this->pm = $pm;

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
