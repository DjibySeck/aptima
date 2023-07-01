<?php

namespace App\Entity;

use App\Repository\ReseauIncendieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReseauIncendieRepository::class)]
class ReseauIncendie extends Centre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column]
    protected ?int $incendie_num_borne = null;

    #[ORM\Column(nullable: true)]
    protected ?float $incendie_latitude = null;

    #[ORM\Column(nullable: true)]
    protected ?float $incendie_longitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $incendie_description = null;

    /*
    Erreur:
    The DQL alias 'r' contains an entity of an inheritance hierarchy with an empty discriminator value. This means that the database contains inconsistent data with an empty discriminator value in a table row.
    */
    protected $discr = 'reseau_incendie';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncendieNumBorne(): ?int
    {
        return $this->incendie_num_borne;
    }

    public function setIncendieNumBorne(int $incendie_num_borne): static
    {
        $this->incendie_num_borne = $incendie_num_borne;

        return $this;
    }

    public function getIncendieLatitude(): ?float
    {
        return $this->incendie_latitude;
    }

    public function setIncendieLatitude(?float $incendie_latitude): static
    {
        $this->incendie_latitude = $incendie_latitude;

        return $this;
    }

    public function getIncendieLongitude(): ?float
    {
        return $this->incendie_longitude;
    }

    public function setIncendieLongitude(?float $incendie_longitude): static
    {
        $this->incendie_longitude = $incendie_longitude;

        return $this;
    }

    public function getIncendieDescription(): ?string
    {
        return $this->incendie_description;
    }

    public function setIncendieDescription(?string $incendie_description): static
    {
        $this->incendie_description = $incendie_description;

        return $this;
    }
    public function __toString()
    {

        return $this->incendie_description;
    }
}
