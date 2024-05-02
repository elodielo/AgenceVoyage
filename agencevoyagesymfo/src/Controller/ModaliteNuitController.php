<?php

namespace App\Controller;

use App\Entity\ModaliteNuit;
use App\Form\ModaliteNuitType;
use App\Repository\ModaliteNuitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/modalite/nuit')]
class ModaliteNuitController extends AbstractController
{
    #[Route('/', name: 'app_modalite_nuit_index', methods: ['GET'])]
    public function index(ModaliteNuitRepository $modaliteNuitRepository): Response
    {
        return $this->render('modalite_nuit/index.html.twig', [
            'modalite_nuits' => $modaliteNuitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_modalite_nuit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modaliteNuit = new ModaliteNuit();
        $form = $this->createForm(ModaliteNuitType::class, $modaliteNuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($modaliteNuit);
            $entityManager->flush();

            return $this->redirectToRoute('app_modalite_nuit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('modalite_nuit/new.html.twig', [
            'modalite_nuit' => $modaliteNuit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_modalite_nuit_show', methods: ['GET'])]
    public function show(ModaliteNuit $modaliteNuit): Response
    {
        return $this->render('modalite_nuit/show.html.twig', [
            'modalite_nuit' => $modaliteNuit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_modalite_nuit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ModaliteNuit $modaliteNuit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModaliteNuitType::class, $modaliteNuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_modalite_nuit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('modalite_nuit/edit.html.twig', [
            'modalite_nuit' => $modaliteNuit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_modalite_nuit_delete', methods: ['POST'])]
    public function delete(Request $request, ModaliteNuit $modaliteNuit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modaliteNuit->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($modaliteNuit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_modalite_nuit_index', [], Response::HTTP_SEE_OTHER);
    }
}
