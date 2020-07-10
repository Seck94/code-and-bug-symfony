<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $numero;

    /**
     * @ORM\Column(type="float")
     */
    private $num_bat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?float
    {
        return $this->numero;
    }

    public function setNumero(float $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumBat(): ?float
    {
        return $this->num_bat;
    }

    public function setNumBat(float $num_bat): self
    {
        $this->num_bat = $num_bat;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
