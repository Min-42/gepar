<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="text", nullable=true)
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $createdBy;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifiedAt;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $modifiedBy;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $deletedBy;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="entreprise", orphanRemoval=true)
     */
    private $documents;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCodeSiren()
    {
        return $this->codeSiren;
    }

    public function setCodeSiren(string $codeSiren)
    {
        $this->codeSiren = $codeSiren;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getGroupe()
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function setContacts(array $contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function getConventionCollective()
    {
        return $this->conventionCollective;
    }

    public function setConventionCollective(string $conventionCollective)
    {
        $this->conventionCollective = $conventionCollective;

        return $this;
    }

    public function getTrancheEffectif()
    {
        return $this->trancheEffectif;
    }

    public function setTrancheEffectif(string $trancheEffectif)
    {
        $this->trancheEffectif = $trancheEffectif;

        return $this;
    }

    public function getNbAdherents()
    {
        return $this->nbAdherents;
    }

    public function setNbAdherents(int $nbAdherents)
    {
        $this->nbAdherents = $nbAdherents;

        return $this;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes(string $notes)
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(\DateTimeInterface $modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeInterface $deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getDeletedBy()
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(?string $deletedBy)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    public function getDocuments()
    {
        return $this->documents;
    }

    public function addDocument(Document $document)
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setEntreprise($this);
        }

        return $this;
    }

    public function removeDocument(Document $document)
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            // set the owning side to null (unless already changed)
            if ($document->getEntreprise() === $this) {
                $document->setEntreprise(null);
            }
        }

        return $this;
    }
}
