<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_planning = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $plan_heure_am_debut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $plan_heure_am_fin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $plan_heure_pm_debut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $plan_heure_pm_fin = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Centre $centre = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePlanning(): ?\DateTimeInterface
    {
        return $this->date_planning;
    }

    public function setDatePlanning(\DateTimeInterface $date_planning): static
    {
        $this->date_planning = $date_planning;

        return $this;
    }

    public function getPlanHeureAmDebut(): ?\DateTimeInterface
    {
        return $this->plan_heure_am_debut;
    }

    public function setPlanHeureAmDebut(\DateTimeInterface $plan_heure_am_debut): static
    {
        $this->plan_heure_am_debut = $plan_heure_am_debut;

        return $this;
    }

    public function getPlanHeureAmFin(): ?\DateTimeInterface
    {
        return $this->plan_heure_am_fin;
    }

    public function setPlanHeureAmFin(\DateTimeInterface $plan_heure_am_fin): static
    {
        $this->plan_heure_am_fin = $plan_heure_am_fin;

        return $this;
    }

    public function getPlanHeurePmDebut(): ?\DateTimeInterface
    {
        return $this->plan_heure_pm_debut;
    }

    public function setPlanHeurePmDebut(\DateTimeInterface $plan_heure_pm_debut): static
    {
        $this->plan_heure_pm_debut = $plan_heure_pm_debut;

        return $this;
    }

    public function getPlanHeurePmFin(): ?\DateTimeInterface
    {
        return $this->plan_heure_pm_fin;
    }

    public function setPlanHeurePmFin(\DateTimeInterface $plan_heure_pm_fin): static
    {
        $this->plan_heure_pm_fin = $plan_heure_pm_fin;

        return $this;
    }

    public function getCentre(): ?Centre
    {
        return $this->centre;
    }

    public function setCentre(?Centre $centre): static
    {
        $this->centre = $centre;

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
