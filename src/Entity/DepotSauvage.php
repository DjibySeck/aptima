<?php

namespace App\Entity;

use App\Repository\DepotSauvageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepotSauvageRepository::class)]
class DepotSauvage extends Centre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 255)]
    protected ?string $depot_description = null;

    #[ORM\Column(nullable: true)]
    protected ?float $depot_latitude = null;

    #[ORM\Column(nullable: true)]
    protected ?float $depot_longitude = null;

    /*
    Erreur:
    The DQL alias 'r' contains an entity of an inheritance hierarchy with an empty discriminator value. This means that the database contains inconsistent data with an empty discriminator value in a table row.
    */
    protected $discr = 'depot_sauvage';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepotDescription(): ?string
    {
        return $this->depot_description;
    }

    public function setDepotDescription(string $depot_description): static
    {
        $this->depot_description = $depot_description;

        return $this;
    }

    public function getDepotLatitude(): ?float
    {
        return $this->depot_latitude;
    }

    public function setDepotLatitude(?float $depot_latitude): static
    {
        $this->depot_latitude = $depot_latitude;

        return $this;
    }

    public function getDepotLongitude(): ?float
    {
        return $this->depot_longitude;
    }

    public function setDepotLongitude(?float $depot_longitude): static
    {
        $this->depot_longitude = $depot_longitude;

        return $this;
    }
}
