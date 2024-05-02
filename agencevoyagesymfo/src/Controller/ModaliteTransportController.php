<?php

namespace App\Controller;

use App\Entity\ModaliteTransport;
use App\Form\ModaliteTransportType;
use App\Repository\ModaliteTransportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/modalite/transport')]
class ModaliteTransportController extends AbstractController
{
    #[Route('/', name: 'app_modalite_transport_index', methods: ['GET'])]
    public function index(ModaliteTransportRepository $modaliteTransportRepository): Response
    {
        return $this->render('modalite_transport/index.html.twig', [
            'modalite_transports' => $modaliteTransportRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_modalite_transport_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modaliteTransport = new ModaliteTransport();
        $form = $this->createForm(ModaliteTransportType::class, $modaliteTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($modaliteTransport);
            $entityManager->flush();

            return $this->redirectToRoute('app_modalite_transport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('modalite_transport/new.html.twig', [
            'modalite_transport' => $modaliteTransport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_modalite_transport_show', methods: ['GET'])]
    public function show(ModaliteTransport $modaliteTransport): Response
    {
        return $this->render('modalite_transport/show.html.twig', [
            'modalite_transport' => $modaliteTransport,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_modalite_transport_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ModaliteTransport $modaliteTransport, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModaliteTransportType::class, $modaliteTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_modalite_transport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('modalite_transport/edit.html.twig', [
            'modalite_transport' => $modaliteTransport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_modalite_transport_delete', methods: ['POST'])]
    public function delete(Request $request, ModaliteTransport $modaliteTransport, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modaliteTransport->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($modaliteTransport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_modalite_transport_index', [], Response::HTTP_SEE_OTHER);
    }
}
