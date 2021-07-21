<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DogController extends AbstractController
{
    /**
     * @Route("/dog", name="dog")
     */
    public function index(): Response
    {
        $form = $this->createForm(MessageType::class);

        return $this->render('dog/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
