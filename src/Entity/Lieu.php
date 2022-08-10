<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LieuRepository::class)
 */
class Lieu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rue;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity=Sortie::class, mappedBy="sorties_lieu")
     */
    private $trips;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="lieux")
     * @ORM\JoinColumn(nullable=true)
     */
    private $lieux_ville;

    public function __construct()
    {
        $this->trips = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection<int, Sortie>
     */
    public function getTrips(): Collection
    {
        return $this->trips;
    }

    public function addTrip(Sortie $trip): self
    {
        if (!$this->trips->contains($trip)) {
            $this->trips[] = $trip;
            $trip->setSortiesLieu($this);
        }

        return $this;
    }

    public function removeTrip(Sortie $trip): self
    {
        if ($this->trips->removeElement($trip)) {
            // set the owning side to null (unless already changed)
            if ($trip->getSortiesLieu() === $this) {
                $trip->setSortiesLieu(null);
            }
        }

        return $this;
    }

    public function getLieuxVille(): ?Ville
    {
        return $this->lieux_ville;
    }

    public function setLieuxVille(?Ville $lieux_ville): self
    {
        $this->lieux_ville = $lieux_ville;

        return $this;
    }
}
