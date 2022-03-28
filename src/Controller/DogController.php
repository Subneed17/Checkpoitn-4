<?php

namespace App\Controller;

use App\Repository\AnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DogController extends AbstractController
{
    /**
     * @Route("/dog", name="dog")
     */
    public function index(AnimauxRepository $animauxRepository): Response
    {
        /**
     * @Route("/", name="dog_index", methods={"GET"})
     */
        return $this->render('dog/index.html.twig', [
            'dogs' => $animauxRepository->findByCategory('Chien'),
        ]);
    }
 }
