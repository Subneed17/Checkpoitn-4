<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use \Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $message = new Message();

        $form = $this->createForm(UserType::class, $message);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()){
        $entityManager->persist($message);
        $entityManager->flush();
    }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
