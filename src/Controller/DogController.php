<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\Message1Type;
use App\Repository\AnimauxRepository;
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
        return $this->render('dog/index.html.twig', [
            'controller_name' => 'DogController',
        ]);
    }
        /**
     * @Route("/dog/show", name="dog_show")
     */
    // public function show(AnimauxRepository $animauxRepository): Response 
    // {
    //     return $this->render('animaux/show.html.twig', [
    //         'dog' => $dogs,
    //     ]);
    // }
 }
