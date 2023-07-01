<?php

namespace App\Entity;

use App\Repository\CentreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CentreRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DescriminatorColumn(name: 'discr', type: 'string')]
#[ORM\DiscriminatorMap(['centre' => Centre::class,'centre_tri' => CentreTri::class,'dechetterie' => Dechetterie::class, 'depot_sauvage' => DepotSauvage::class, 'reseau_incendie' => ReseauIncendie::class])]
class Centre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 255)]
    protected ?string $adresse = null;

    #[ORM\Column(length: 100)]
    protected ?string $ville = null;

    #[ORM\Column]
    protected ?int $code_postal = null;

    #[ORM\Column(length: 80)]
    protected ?string $nom_centre = null;

    #[ORM\Column(length: 90)]
    protected ?string $groupe = null;

    /*
    Erreur:
    The DQL alias 'r' contains an entity of an inheritance hierarchy with an empty discriminator value. This means that the database contains inconsistent data with an empty discriminator value in a table row.
    */
    protected $disc = 'centre';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getNomCentre(): ?string
    {
        return $this->nom_centre;
    }

    public function setNomCentre(string $nom_centre): static
    {
        $this->nom_centre = $nom_centre;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): static
    {
        $this->groupe = $groupe;

        return $this;
    }
    public function __toString()
    {

        return $this->ville;
    }
}
