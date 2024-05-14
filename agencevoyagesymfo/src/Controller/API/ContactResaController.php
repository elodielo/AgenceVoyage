<?php

namespace App\Controller\API;

use App\Entity\ContactResa;
use App\Entity\Voyage;
use App\Repository\VoyageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/contactResa', name: 'api_contactResa_')]
class ContactResaController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('api/contact_resa/index.html.twig', [
            'controller_name' => 'ContactResaController',
        ]);
    }


    #[Route('/new/{nomVoyage}', name: 'new', methods: ['POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        VoyageRepository $voyageRepository
    ) {
        $contactResa = $serializer->deserialize(
            $request->getContent(),
            ContactResa::class,
            'json',
            context: ['groups' => 'api_contactResa_new']
        );
        $nomVoyage = $request->attributes->get('nomVoyage');;
        $voyage = $voyageRepository->findVoyageParNom($nomVoyage);
        $errors = $validator->validate($contactResa);
        if ($errors->count()) {
            $messages = [];
            foreach ($errors as $error) {
                $message[] = $error->getMessage();
            }
            return $this->json($messages, Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $contactResa->setVoyage($voyage);
            $em->persist($contactResa);
            $em->flush();
            $this->addFlash('sucess', 'categorie ajoutée');
            return $this->json(null, Response::HTTP_CREATED);
        }
    }
}
