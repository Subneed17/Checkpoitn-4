<?php

namespace App\Controller;

use App\Repository\AnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatController extends AbstractController
{
    /**
     * @Route("/cat", name="cat")
     */
    public function index(AnimauxRepository $animauxRepository): Response
    {
        /**
     * @Route("/", name="cat_index", methods={"GET"})
     */
        return $this->render('cat/index.html.twig', [
            'cats' => $animauxRepository->findByCategory('Cat'),
        ]);
    }
}
