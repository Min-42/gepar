<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 */
class Document
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichier;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $extension;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $taille;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="documents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $attachedTo;

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    public function getFichier()
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function setExtension(string $extension)
    {
        $this->extension = $extension;

        return $this;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function setTaille(string $taille)
    {
        $this->taille = $taille;

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

    public function getEntreprise()
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getAttachedTo()
    {
        return $this->attachedTo;
    }

    public function setAttachedTo(string $attachedTo)
    {
        $this->attachedTo = $attachedTo;

        return $this;
    }

    public function display()
    {
        return '<a href="'.$this->fichier.'" target="_blank">'.$this->type.'</a><br>';
    }
}
