<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=9)
     */
    private $codeSiren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groupe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Document")
     */
    private $documents;

    /**
     * @ORM\Column(type="text")
     */
    private $contacts;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $conventionCollective;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trancheEffectif;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbAdherents;

    /**
     * @ORM\Column(type="text")
     */
    private $notes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeSiren(): ?string
    {
        return $this->codeSiren;
    }

    public function setCodeSiren(string $codeSiren): self
    {
        $this->codeSiren = $codeSiren;

        return $this;
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

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getDocuments(): ?Document
    {
        return $this->documents;
    }

    public function setDocuments(?Document $documents): self
    {
        $this->documents = $documents;

        return $this;
    }

    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    public function setContacts(array $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function getConventionCollective(): ?string
    {
        return $this->conventionCollective;
    }

    public function setConventionCollective(string $conventionCollective): self
    {
        $this->conventionCollective = $conventionCollective;

        return $this;
    }

    public function getTrancheEffectif(): ?string
    {
        return $this->trancheEffectif;
    }

    public function setTrancheEffectif(string $trancheEffectif): self
    {
        $this->trancheEffectif = $trancheEffectif;

        return $this;
    }

    public function getNbAdherents(): ?int
    {
        return $this->nbAdherents;
    }

    public function setNbAdherents(int $nbAdherents): self
    {
        $this->nbAdherents = $nbAdherents;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }
}
