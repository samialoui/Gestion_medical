<?php

namespace App\Controller;

use App\Entity\Patient;

use App\Entity\Users;
use App\Repository\RendezVousRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\String\Slugger\SluggerInterface;

class SecretaireController extends AbstractController
{ /**
 * @Route("/list", name="list_patients")
 */
    public function home()
    {

        $patients = $this->getDoctrine()->getRepository(Patient::class)->findAll();
        return $this->render('methodesSecritaire/Afficher.html.twig',['patients'=>$patients]);
    }

    /**
     * @Route("/ajouter", name="ajouter_patient")
     * Method({"GET","POST"})
     */
    public function AjouterPat(Request $request){
        $patient = new Patient();
        $form = $this->createFormBuilder($patient)
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('sexe',TextType::class)
            ->add('age',TextType::class)
            ->add('numDos',TextType::class)
            ->add('numTel',TextType::class)
            ->add('adr',TextType::class)
            ->add('save',SubmitType::class,array('label'=>'Ajouter'))->getForm();
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){
            $patient = $form->getData();
            $EntityManager = $this->getDoctrine()->getManager();
            $EntityManager->persist($patient);
            $EntityManager->flush();
            return $this->redirectToRoute('list_patients');
        }
            return $this->render('methodesSecritaire/Ajouter.html.twig',['form'=>$form->createView()]);
    }

    /**
     * @Route("/patient/modifier/{id}" ,name="modifer_patient")
     * Method({"GET","POST"})
     */
    public function modifierPat(Request $request,$id){
        $patient = new Patient();
        $patient = $this->getDoctrine()->getRepository(Patient::class)->find($id);
        $form = $this->createFormBuilder($patient)
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('sexe',TextType::class)
            ->add('age',TextType::class)
            ->add('numDos',TextType::class)
            ->add('numTel',TextType::class)
            ->add('adr',TextType::class)
            ->add('save',SubmitType::class,array('label'=>'Modifier'))->getForm();
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){
            $patient = $form->getData();
            $EntityManager = $this->getDoctrine()->getManager();
            $EntityManager->flush();
            return $this->redirectToRoute('list_patients');
        }
        return $this->render('methodesSecritaire/modifier.html.twig',['form'=>$form->createView()]);

    }

    /**
     * @Route("/patient/details/{id}" , name="details_patient")
     */
    public function detailPat($id){
        $patient = $this->getDoctrine()->getRepository(Patient::class)->find($id);
        return $this->render('methodesSecritaire/detail.html.twig',array('patient'=>$patient));
    }

    /**
     * @Route("patient/supprimer/{id}" , name="supprimer_patient")
     */

    public function supprimerPat(Request $request,$id){
        $patient = new Patient();
        $patient = $this->getDoctrine()->getRepository(Patient::class)->find($id);
        $EntityManager = $this->getDoctrine()->getManager();
        $EntityManager->remove($patient);
        $EntityManager->flush();
        $response  = new Response();
        $response->send();
        return $this->redirectToRoute('list_patients');
    }

    /**
     * @Route("/acceuil", name="acceuil")
     */
    public function acceuil(){
        return $this->render('interfaceAcceuil/acceuil.html.twig');
    }
    /**
     * @Route("agenda_list" ,name="agenda")
     */
    public function Agenda(){
        return $this->render('methodesSecritaire/agenda.html.twig');
    }
    /**
     * @Route("Afficher_rv", name="affichage")
     */
    public function AgendaRV(RendezVousRepository $rendezVous){
        $events = $rendezVous->findAll();
        $rdvs =[];
        foreach ($events as $event){
            $rdvs [] =[
                'id'=>$event->getId(),
                'titre'=>$event->getTitre(),
                'start'=>$event->getStart()->format('Y-m-d H:i:s'),
                'end'=>$event->getEnd()->format('Y-m-d H:i:s'),
                'description'=>$event->getDescription(),
                'backroundColor'=>$event->getBackroundColor(),
                'borderColor'=>$event->getBorderColor(),
                'textColor'=>$event->getTextColor(),
                'all_days'=>$event->getAllDays(),
            ];
        }
        $data=json_encode($rdvs);
        return $this->render('methodesSecritaire/agenda.html.twig',['data'=>$data]);
    }

    /**
     * @Route("/Affiche.Profile", name="Profile")
     */
    public function AffichProfil(){
        return $this->render('Profile/Profile.html.twig');
    }
    /**
     * @Route("/modProfile/modifier/{id}" ,name="modifer_profile")
     * Method({"GET","POST"})
     */
    public function modifierProf(Request $request,$id,SluggerInterface $slugger){
        $profile = new Users();
        $profile = $this->getDoctrine()->getRepository(Users::class)->find($id);
        $form = $this->createFormBuilder($profile)
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('sexe',TextType::class)
            ->add('age',TextType::class)
            ->add('adresse',TextType::class)
            ->add('numTele',TextType::class)
            ->add('image', FileType::class, [
                'label' => 'Brochure (PDF file)',
                'mapped' => false,
                'required' => false,
                /*'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],*/
            ])
            // ...

            ->add('save',SubmitType::class,array('label'=>'Modifier'))->getForm();
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFile->move(
                        $this->getParameter('users_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    dd($e);
                }


                $user->setImage($newFilename);
            }
            $EntityManager = $this->getDoctrine()->getManager();
            $EntityManager->flush();
            return $this->redirectToRoute('Profile');
        }
        return $this->render('Profile/ModifProfile.html.twig',['form'=>$form->createView()]);

    }

}
