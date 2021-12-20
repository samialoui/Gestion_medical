<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\RendezVous;
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
}
