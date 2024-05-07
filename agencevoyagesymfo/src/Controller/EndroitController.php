<?php

namespace App\Controller;

use App\Entity\Endroit;
use App\Form\EndroitType;
use App\Repository\EndroitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/endroit')]
#[IsGranted('ROLE_ADMIN')]
class EndroitController extends AbstractController
{
    #[Route('/', name: 'app_endroit_index', methods: ['GET'])]
    public function index(EndroitRepository $endroitRepository): Response
    {
        return $this->render('endroit/index.html.twig', [
            'endroits' => $endroitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_endroit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $endroit = new Endroit();
        $form = $this->createForm(EndroitType::class, $endroit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($endroit);
            $entityManager->flush();

            return $this->redirectToRoute('app_endroit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('endroit/new.html.twig', [
            'endroit' => $endroit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_endroit_show', methods: ['GET'])]
    public function show(Endroit $endroit): Response
    {
        return $this->render('endroit/show.html.twig', [
            'endroit' => $endroit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_endroit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Endroit $endroit, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EndroitType::class, $endroit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_endroit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('endroit/edit.html.twig', [
            'endroit' => $endroit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_endroit_delete', methods: ['POST'])]
    public function delete(Request $request, Endroit $endroit, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$endroit->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($endroit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_endroit_index', [], Response::HTTP_SEE_OTHER);
    }
}
