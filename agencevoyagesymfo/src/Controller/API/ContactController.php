<?php

namespace App\Controller\API;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/contact', name: 'api_contact_')]
class ContactController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(): Response
    {
        return $this->render('api_contact/index.html.twig', [
            'controller_name' => 'APIContactController',
        ]);
    }

    #[Route('/new', name: 'new', methods: ['POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ) {
        $contact = $serializer->deserialize(
            $request->getContent(),
            Contact::class,
            'json',
            context: ['groups' => 'api_contact_new']
        );

        $errors = $validator->validate($contact);
        if ($errors->count()) {
            $messages = [];
            foreach ($errors as $error) {
                $message[] = $error->getMessage();
            }
            return $this->json($messages, Response::HTTP_UNPROCESSABLE_ENTITY);
        }  else {
            $em->persist($contact);
            $em->flush();
            $this->addFlash('sucess', 'categorie ajoutée');
            return $this->json(null, Response::HTTP_CREATED);
        }
    }
}
