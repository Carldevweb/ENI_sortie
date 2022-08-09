<?php

namespace App\Entity;

use App\Repository\ProfilUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Entity(repositoryClass=ProfilUtilisateurRepository::class)
 */
class ProfilUtilisateur implements PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Pseudo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="text")
     */
    private $Email;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $MotDePasse;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Campus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MaPhoto;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->Telephone;
    }

    public function setTelephone(int $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->MotDePasse;
    }

    public function setMotDePasse(string $MotDePasse): self
    {
        $this->MotDePasse = $MotDePasse;

        return $this;
    }

    public function getCampus(): ?string
    {
        return $this->Campus;
    }

    public function setCampus(string $Campus): self
    {
        $this->Campus = $Campus;

        return $this;
    }

    public function getMaPhoto(): ?string
    {
        return $this->MaPhoto;
    }

    public function setMaPhoto(string $MaPhoto):self
    {
        $this->MaPhoto = $MaPhoto;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->getMotDePasse();
    }
}





