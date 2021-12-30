<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
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
    private $dataCons;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $diagnostic;

    /**
     * @ORM\OneToMany(targetEntity=Patient::class, mappedBy="consultation")
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity=Medecin::class, inversedBy="consultations")
     */
    private $medecin;

    /**
     * @ORM\OneToOne(targetEntity=Patient::class, cascade={"persist", "remove"})
     */
    private $Pat;

    public function __construct()
    {
        $this->patient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataCons(): ?\DateTimeInterface
    {
        return $this->dataCons;
    }

    public function setDataCons(\DateTimeInterface $dataCons): self
    {
        $this->dataCons = $dataCons;

        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(string $diagnostic): self
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getPatient(): Collection
    {
        return $this->patient;
    }

    public function addPatient(Patient $patient): self
    {
        if (!$this->patient->contains($patient)) {
            $this->patient[] = $patient;
            $patient->setConsultation($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patient->removeElement($patient)) {
            // set the owning side to null (unless already changed)
            if ($patient->getConsultation() === $this) {
                $patient->setConsultation(null);
            }
        }

        return $this;
    }

    public function getMedecin(): ?Medecin
    {
        return $this->medecin;
    }

    public function setMedecin(?Medecin $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getPat(): ?Patient
    {
        return $this->Pat;
    }

    public function setPat(?Patient $Pat): self
    {
        $this->Pat = $Pat;

        return $this;
    }
    public function __toString(){
        return $this->id;
    }
}
