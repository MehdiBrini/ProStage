<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $siegeSocial;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $siteWeb;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $numTel;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $adresseMail;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="EntrepriseReliee")
     */
    private $entreprises;

    public function __construct()
    {
        $this->entreprises = new ArrayCollection();
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

    public function getSiegeSocial(): ?string
    {
        return $this->siegeSocial;
    }

    public function setSiegeSocial(string $siegeSocial): self
    {
        $this->siegeSocial = $siegeSocial;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(string $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntreprise(Stage $entreprise): self
    {
        if (!$this->entreprises->contains($entreprise)) {
            $this->entreprises[] = $entreprise;
            $entreprise->setEntrepriseReliee($this);
        }

        return $this;
    }

    public function removeEntreprise(Stage $entreprise): self
    {
        if ($this->entreprises->contains($entreprise)) {
            $this->entreprises->removeElement($entreprise);
            // set the owning side to null (unless already changed)
            if ($entreprise->getEntrepriseReliee() === $this) {
                $entreprise->setEntrepriseReliee(null);
            }
        }

        return $this;
    }
}
