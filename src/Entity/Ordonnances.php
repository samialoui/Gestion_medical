<?php

namespace App\Entity;

use App\Repository\OrdonnancesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdonnancesRepository::class)
 */
class Ordonnances
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $médicaments;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMédicaments(): ?string
    {
        return $this->médicaments;
    }

    public function setMédicaments(string $médicaments): self
    {
        $this->médicaments = $médicaments;

        return $this;
    }
}
