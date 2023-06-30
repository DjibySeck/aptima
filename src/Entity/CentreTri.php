<?php

namespace App\Entity;

use App\Repository\CentreTriRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CentreTriRepository::class)]
class CentreTri extends Centre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 255)]
    protected ?string $tri_lieu = null;

    #[ORM\Column]
    protected ?float $tri_heure_am_debut = null;

    #[ORM\Column]
    protected ?float $tri_heure_am_fin = null;

    #[ORM\Column]
    protected ?float $tri_heure_pm_debut = null;

    #[ORM\Column]
    protected ?float $tri_heure_pm_fin = null;

    /*
    Erreur:
    The DQL alias 'r' contains an entity of an inheritance hierarchy with an empty discriminator value. This means that the database contains inconsistent data with an empty discriminator value in a table row.
    */
    protected $discr = 'centre_tri';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTriLieu(): ?string
    {
        return $this->tri_lieu;
    }

    public function setTriLieu(string $tri_lieu): static
    {
        $this->tri_lieu = $tri_lieu;

        return $this;
    }

    public function getTriHeureAmDebut(): ?float
    {
        return $this->tri_heure_am_debut;
    }

    public function setTriHeureAmDebut(float $tri_heure_am_debut): static
    {
        $this->tri_heure_am_debut = $tri_heure_am_debut;

        return $this;
    }

    public function getTriHeureAmFin(): ?float
    {
        return $this->tri_heure_am_fin;
    }

    public function setTriHeureAmFin(float $tri_heure_am_fin): static
    {
        $this->tri_heure_am_fin = $tri_heure_am_fin;

        return $this;
    }

    public function getTriHeurePmDebut(): ?float
    {
        return $this->tri_heure_pm_debut;
    }

    public function setTriHeurePmDebut(float $tri_heure_pm_debut): static
    {
        $this->tri_heure_pm_debut = $tri_heure_pm_debut;

        return $this;
    }

    public function getTriHeurePmFin(): ?float
    {
        return $this->tri_heure_pm_fin;
    }

    public function setTriHeurePmFin(float $tri_heure_pm_fin): static
    {
        $this->tri_heure_pm_fin = $tri_heure_pm_fin;

        return $this;
    }
}
