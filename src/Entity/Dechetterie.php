<?php

namespace App\Entity;

use App\Repository\DechetterieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DechetterieRepository::class)]
class Dechetterie extends Centre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 100)]
    protected ?string $dech_nom = null;

    #[ORM\Column(nullable: true)]
    protected ?int $dech_tel = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    protected ?\DateTimeInterface $dech_heure_am_debut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    protected ?\DateTimeInterface $dech_heure_am_fin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    protected ?\DateTimeInterface $dech_heure_pm_debut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    protected ?\DateTimeInterface $dech_heure_pm_fin = null;

    /*
    Erreur:
    The DQL alias 'r' contains an entity of an inheritance hierarchy with an empty discriminator value. This means that the database contains inconsistent data with an empty discriminator value in a table row.
    */
    protected $discr = 'dechetterie';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDechNom(): ?string
    {
        return $this->dech_nom;
    }

    public function setDechNom(string $dech_nom): static
    {
        $this->dech_nom = $dech_nom;

        return $this;
    }

    public function getDechTel(): ?int
    {
        return $this->dech_tel;
    }

    public function setDechTel(?int $dech_tel): static
    {
        $this->dech_tel = $dech_tel;

        return $this;
    }

    public function getDechHeureAmDebut(): ?\DateTimeInterface
    {
        return $this->dech_heure_am_debut;
    }

    public function setDechHeureAmDebut(\DateTimeInterface $dech_heure_am_debut): static
    {
        $this->dech_heure_am_debut = $dech_heure_am_debut;

        return $this;
    }

    public function getDechHeureAmFin(): ?\DateTimeInterface
    {
        return $this->dech_heure_am_fin;
    }

    public function setDechHeureAmFin(\DateTimeInterface $dech_heure_am_fin): static
    {
        $this->dech_heure_am_fin = $dech_heure_am_fin;

        return $this;
    }

    public function getDechHeurePmDebut(): ?\DateTimeInterface
    {
        return $this->dech_heure_pm_debut;
    }

    public function setDechHeurePmDebut(\DateTimeInterface $dech_heure_pm_debut): static
    {
        $this->dech_heure_pm_debut = $dech_heure_pm_debut;

        return $this;
    }

    public function getDechHeurePmFin(): ?\DateTimeInterface
    {
        return $this->dech_heure_pm_fin;
    }

    public function setDechHeurePmFin(\DateTimeInterface $dech_heure_pm_fin): static
    {
        $this->dech_heure_pm_fin = $dech_heure_pm_fin;

        return $this;
    }
    public function __toString()
    {

        return $this->dech_tel;
    }
}
