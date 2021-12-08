<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Security\UsersAuthenticator;
use Doctrine\DBAL\Types\ArrayType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UsersAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/add_user", name="add.user")
     * Method({"GET","POST"})
     */
    public function addUser(Request $request){
        $user = new Users();
        $form = $this->createFormBuilder($user)
            ->add('email',TextType::class)
            ->add('password',TextType::class)
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('age',TextType::class)
            ->add('adresse',TextType::class)
            ->add('num_tele',TextType::class)
            ->add('profession',TextType::class)
            ->add('sexe',TextType::class)
            ->add('save',SubmitType::class,array('label'=>'Ajouter'))->getForm();
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $EntityManager = $this->getDoctrine()->getManager();
            $EntityManager->persist($user);
            $EntityManager->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render('registration/utilisateur.html.twig',['form'=>$form->createView()]);
    }
}
