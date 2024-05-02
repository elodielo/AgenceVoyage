<?php

namespace App\Controller\API;

use App\Repository\VoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/voyage', name: 'api_voyage_')]
class VoyageController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(VoyageRepository $voyageRepository): Response
    {
        $voyages = $voyageRepository->findAll();
        return $this->json(data: $voyages, context:['groups' => 'api_voyage_index']);
    }

    #[Route('/tous', name: 'tous')]
    public function tous(VoyageRepository $voyageRepository): Response
    {
        $voyages = $voyageRepository->findAllwithAll();
        return $this->json(data: $voyages, context:['groups' => 'api_voyage_index']);
    }

    #[Route('/show', name: 'index')]
    public function show(VoyageRepository $voyageRepository): Response
    {
        $voyages = $voyageRepository->findVoyageWhereModaliteTransport("velo");
        return $this->json(data: $voyages, context:['groups' => 'api_voyage_index']);
    }

    #[Route('/triPays', name: 'triPays')]
    public function triPays(VoyageRepository $voyageRepository): Response
    {
        $voyages = $voyageRepository->findVoyageParPays("France");
        return $this->json(data: $voyages, context:['groups' => 'api_voyage_index']);
    }

    
}
