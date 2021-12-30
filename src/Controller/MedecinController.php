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
use App\Repository\PatientRepository;
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

    #[Route('/stats' , name :'statisitique')]
 public function statistique(PatientRepository $patRep){
        $repository = $this->getDoctrine()
            ->getRepository(Patient::class);
        $homme = $repository->findPatientByHomme();
        $femme = $repository->findPatientByFemme();
        $nbHomme = count($homme);
        $nbFemme = count($femme);
        $ageSup50 = $repository->findPatientByAgeSup50();
        $ageInf50 = $repository->findPatientByAgeInf50();
        $nbAgeSup = count($ageSup50);
        $nbAgeInf = count($ageInf50);
        $tunis = $repository->findPatientDeTunis();
        $marsa = $repository->findPatientDeMarsa();
        $metlaoui = $repository->findPatientDeMetlaoui();
        $mednine = $repository->findPatientDeMednine();
        $beja = $repository->findPatientDeBeja();
        $nbTunis = count($tunis);
        $nbMarsa = count($marsa);
        $nbMetlaoui = count($metlaoui);
        $nbMednine = count($mednine);
        $nbBeja = count($beja);
        $repository1 = $this->getDoctrine()
            ->getRepository(Consultation::class);
        $consEnCours = $repository1->findDiagnosticByDiag1();
        $consEnAttente = $repository1->findDiagnosticByDiag2();
        $nbConsEnAttente = count($consEnCours);
        $nbConsEnCours = count($consEnAttente);
        //$patients = $patRep->findAll();
       // $patNom=[];
       // $patColor=[];
        $patCount=[];
        /*foreach ($patients as $patient){
            $patNom[] = $patient->getNom();
            $patColor[] = $patient->getColor();
            //$patCount[] = count($patient->);
        }*/

        return $this->render('statistique/stats.html.twig',[
            'homme'=>json_encode($nbHomme),
            'femme'=>json_encode($nbFemme),
            'AgeSup'=>json_encode($nbAgeSup),
            'AgeInf'=>json_encode($nbAgeInf),
            'ConsEnCours'=>json_encode($nbConsEnCours),
            'ConsEnAttente'=>json_encode($nbConsEnAttente),
            'tunis'=>json_encode($nbTunis),
            'marsa'=>json_encode($nbMarsa),
            'metlaoui'=>json_encode($nbMetlaoui),
            'mednine'=>json_encode($nbMednine),
            'beja'=>json_encode($nbBeja)
            //'patColor'=>json_encode($patColor),
            //'patCount'=>json_encode($patCount)
        ]);
    }

    /***************** Tableaux **********************/
    #[Route('/tabs' , name :'statisitique.tabs')]
    public function statistique1(PatientRepository $patRep){
        $repository = $this->getDoctrine()
            ->getRepository(Patient::class);
        $homme = $repository->findPatientByHomme();
        $femme = $repository->findPatientByFemme();
        $nbHomme = count($homme);
        $nbFemme = count($femme);
        $ageSup50 = $repository->findPatientByAgeSup50();
        $ageInf50 = $repository->findPatientByAgeInf50();
        $nbAgeSup = count($ageSup50);
        $nbAgeInf = count($ageInf50);
        $allAge = $repository->findAll();
        $TotalAge = count($allAge);

        $tunis = $repository->findPatientDeTunis();
        $marsa = $repository->findPatientDeMarsa();
        $metlaoui = $repository->findPatientDeMetlaoui();
        $mednine = $repository->findPatientDeMednine();
        $beja = $repository->findPatientDeBeja();
        $nbTunis = count($tunis);
        $nbMarsa = count($marsa);
        $nbMetlaoui = count($metlaoui);
        $nbMednine = count($mednine);
        $nbBeja = count($beja);
        $repository1 = $this->getDoctrine()
            ->getRepository(Consultation::class);
        $consEnCours = $repository1->findDiagnosticByDiag1();
        $consEnAttente = $repository1->findDiagnosticByDiag2();
        $nbConsEnAttente = count($consEnCours);
        $nbConsEnCours = count($consEnAttente);
        //$patients = $patRep->findAll();
        // $patNom=[];
        // $patColor=[];
        $patCount=[];
        /*foreach ($patients as $patient){
            $patNom[] = $patient->getNom();
            $patColor[] = $patient->getColor();
            //$patCount[] = count($patient->);
        }*/

        return $this->render('statistique/tabs.html.twig',[
            'homme'=>json_encode($nbHomme),
            'femme'=>json_encode($nbFemme),
            'AgeSup'=>json_encode($nbAgeSup),
            'AgeInf'=>json_encode($nbAgeInf),
            'totalAge'=>json_encode($TotalAge),
            'ConsEnCours'=>json_encode($nbConsEnCours),
            'ConsEnAttente'=>json_encode($nbConsEnAttente),
            'tunis'=>json_encode($nbTunis),
            'marsa'=>json_encode($nbMarsa),
            'metlaoui'=>json_encode($nbMetlaoui),
            'mednine'=>json_encode($nbMednine),
            'beja'=>json_encode($nbBeja)
            //'patColor'=>json_encode($patColor),
            //'patCount'=>json_encode($patCount)
        ]);
    }
}
