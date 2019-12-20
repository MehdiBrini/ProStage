<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $domaine;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $niveauDelivre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="typeFormation")
     */
    private $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getNiveauDelivre(): ?string
    {
        return $this->niveauDelivre;
    }

    public function setNiveauDelivre(string $niveauDelivre): self
    {
        $this->niveauDelivre = $niveauDelivre;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Stage $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setTypeFormation($this);
        }

        return $this;
    }

    public function removeFormation(Stage $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            // set the owning side to null (unless already changed)
            if ($formation->getTypeFormation() === $this) {
                $formation->setTypeFormation(null);
            }
        }

        return $this;
    }
}
