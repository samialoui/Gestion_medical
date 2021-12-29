<?php

namespace App\Controller;

use App\Entity\Antecedents;
use App\Form\AntecedentsType;
use App\Repository\AntecedentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/antecedents')]
class AntecedentsController extends AbstractController
{
    #[Route('/', name: 'antecedents_index', methods: ['GET'])]
    public function index(AntecedentsRepository $antecedentsRepository): Response
    {
        return $this->render('methodesSecritaire/detail.html.twig', [
            'antecedents' => $antecedentsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'antecedents_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $antecedent = new Antecedents();
        $form = $this->createForm(AntecedentsType::class, $antecedent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($antecedent);
            $entityManager->flush();

            return $this->redirectToRoute('antecedents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('antecedents/new.html.twig', [
            'antecedent' => $antecedent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'antecedents_show', methods: ['GET'])]
    public function show(Antecedents $antecedent): Response
    {
        return $this->render('antecedents/show.html.twig', [
            'antecedent' => $antecedent,
        ]);
    }

    #[Route('/{id}/edit', name: 'antecedents_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Antecedents $antecedent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AntecedentsType::class, $antecedent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('antecedents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('antecedents/edit.html.twig', [
            'antecedent' => $antecedent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'antecedents_delete', methods: ['POST'])]
    public function delete(Request $request, Antecedents $antecedent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$antecedent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($antecedent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('antecedents_index', [], Response::HTTP_SEE_OTHER);
    }
}
