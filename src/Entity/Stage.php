<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=8)
     */
    private $idStage;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $intitule;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $domaine;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $formation;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $contactMail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formation", inversedBy="formations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeFormation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="entreprises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $EntrepriseReliee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdStage(): ?string
    {
        return $this->idStage;
    }

    public function setIdStage(string $idStage): self
    {
        $this->idStage = $idStage;

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

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

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getContactMail(): ?string
    {
        return $this->contactMail;
    }

    public function setContactMail(string $contactMail): self
    {
        $this->contactMail = $contactMail;

        return $this;
    }

    public function getTypeFormation(): ?Formation
    {
        return $this->typeFormation;
    }

    public function setTypeFormation(?Formation $typeFormation): self
    {
        $this->typeFormation = $typeFormation;

        return $this;
    }

    public function getEntrepriseReliee(): ?Entreprise
    {
        return $this->EntrepriseReliee;
    }

    public function setEntrepriseReliee(?Entreprise $EntrepriseReliee): self
    {
        $this->EntrepriseReliee = $EntrepriseReliee;

        return $this;
    }
}
