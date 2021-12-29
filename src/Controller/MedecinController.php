<?php

namespace App\Controller;

use App\Entity\Antecedents;
use App\Entity\Consultation;
use App\Entity\Hospitalisations;
use App\Entity\Patient;
use App\Entity\RendezVous;
use App\Entity\Traitements;
use App\Entity\Visite;
use App\Form\ConsultationType;
use App\Form\RendezVousType;
use App\Repository\ConsultationRepository;
use App\Repository\MedecinRepository;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/consultations')]
class MedecinController extends AbstractController
{
    #[Route('/list_cons', name: 'consultations.list')]
    public function index(ConsultationRepository $consultationRepository): Response
    {
        return $this->render('medecin/index.html.twig', [
            'consultations' => $consultationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'consultation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $consultation = new Consultation();
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($consultation);
            $entityManager->flush();

            return $this->redirectToRoute('consultations.list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medecin/nouveau.html.twig', [
            'consultation' => $consultation,
            'form' => $form,
        ]);
    }
    #[Route('/foundation/{id}', name: 'joint', methods: ['GET', 'POST'])]
    public function find($id) {
        $repository1 = $this->getDoctrine()
            ->getRepository(Patient::class);
        $Patient = $repository1->findPatientById($id);

        $repository2 = $this->getDoctrine()
            ->getRepository(Visite::class);
        $Visite = $repository2->findVisiteById($id);

        $repository3 = $this->getDoctrine()
            ->getRepository(Antecedents::class);
        $Antecedent = $repository3->findAntecedentById($id);
        $repository4 = $this->getDoctrine()
            ->getRepository(Traitements::class);
        $Traitement = $repository4->findTraitementById($id);
        return $this->render('methodesSecritaire/detail.html.twig', [
            'patients' => $Patient,
            'visites' => $Visite,
            'antecedents' => $Antecedent,
            'traitements' => $Traitement
            ]);
    }
}
