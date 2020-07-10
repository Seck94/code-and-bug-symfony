<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     */
    private $telephone;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Chambr::class, mappedBy="Etudiant")
     */
    private $chambrs;

    public function __construct()
    {
        $this->chambrs = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?float
    {
        return $this->telephone;
    }

    public function setTelephone(float $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Chambr[]
     */
    public function getChambrs(): Collection
    {
        return $this->chambrs;
    }

    public function addChambr(Chambr $chambr): self
    {
        if (!$this->chambrs->contains($chambr)) {
            $this->chambrs[] = $chambr;
            $chambr->setEtudiant($this);
        }

        return $this;
    }

    public function removeChambr(Chambr $chambr): self
    {
        if ($this->chambrs->contains($chambr)) {
            $this->chambrs->removeElement($chambr);
            // set the owning side to null (unless already changed)
            if ($chambr->getEtudiant() === $this) {
                $chambr->setEtudiant(null);
            }
        }

        return $this;
    }
}
