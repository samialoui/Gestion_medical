<?php

namespace App\Entity;

use App\Repository\HospitalisationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HospitalisationsRepository::class)
 */
class Hospitalisations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $affections;

    /**
     * @ORM\OneToOne(targetEntity=Patient::class, cascade={"persist", "remove"}, fetch="EAGER")
     */
    private $patient;

    /**
     * @ORM\OneToOne(targetEntity=Visite::class, cascade={"persist", "remove"}, fetch="EAGER")
     */
    private $visite;

    /**
     * @ORM\OneToOne(targetEntity=Antecedents::class, cascade={"persist", "remove"}, fetch="EAGER")
     */
    private $antecedent;

    /**
     * @ORM\OneToOne(targetEntity=Ordonnances::class, cascade={"persist", "remove"})
     */
    private $ordonnance;

    /**
     * @ORM\OneToOne(targetEntity=HistoireMaladie::class, cascade={"persist", "remove"})
     */
    private $histMaladie;

    /**
     * @ORM\OneToOne(targetEntity=Diagnostics::class, cascade={"persist", "remove"})
     */
    private $Diagnostics;

    /**
     * @ORM\OneToOne(targetEntity=ExamensClinique::class, cascade={"persist", "remove"})
     */
    private $examensClinique;

    /**
     * @ORM\OneToOne(targetEntity=Evolution::class, cascade={"persist", "remove"})
     */
    private $evolution;

    /**
     * @ORM\OneToOne(targetEntity=ExamensComplementaire::class, cascade={"persist", "remove"})
     */
    private $examensComp;

    /**
     * @ORM\OneToOne(targetEntity=Traitements::class, cascade={"persist", "remove"})
     */
    private $traitement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAffections(): ?string
    {
        return $this->affections;
    }

    public function setAffections(string $affections): self
    {
        $this->affections = $affections;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getVisite(): ?Visite
    {
        return $this->visite;
    }

    public function setVisite(?Visite $visite): self
    {
        $this->visite = $visite;

        return $this;
    }

    public function getAntecedent(): ?Antecedents
    {
        return $this->antecedent;
    }

    public function setAntecedent(?Antecedents $antecedent): self
    {
        $this->antecedent = $antecedent;

        return $this;
    }

    public function getOrdonnance(): ?Ordonnances
    {
        return $this->ordonnance;
    }

    public function setOrdonnance(?Ordonnances $ordonnance): self
    {
        $this->ordonnance = $ordonnance;

        return $this;
    }

    public function getHistMaladie(): ?HistoireMaladie
    {
        return $this->histMaladie;
    }

    public function setHistMaladie(?HistoireMaladie $histMaladie): self
    {
        $this->histMaladie = $histMaladie;

        return $this;
    }

    public function getDiagnostics(): ?Diagnostics
    {
        return $this->Diagnostics;
    }

    public function setDiagnostics(?Diagnostics $Diagnostics): self
    {
        $this->Diagnostics = $Diagnostics;

        return $this;
    }

    public function getExamensClinique(): ?ExamensClinique
    {
        return $this->examensClinique;
    }

    public function setExamensClinique(?ExamensClinique $examensClinique): self
    {
        $this->examensClinique = $examensClinique;

        return $this;
    }

    public function getEvolution(): ?Evolution
    {
        return $this->evolution;
    }

    public function setEvolution(?Evolution $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }

    public function getExamensComp(): ?ExamensComplementaire
    {
        return $this->examensComp;
    }

    public function setExamensComp(?ExamensComplementaire $examensComp): self
    {
        $this->examensComp = $examensComp;

        return $this;
    }

    public function getTraitement(): ?Traitements
    {
        return $this->traitement;
    }

    public function setTraitement(?Traitements $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }
}
