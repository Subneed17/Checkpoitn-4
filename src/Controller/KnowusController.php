<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KnowusController extends AbstractController
{
    /**
     * @Route("/knowus", name="knowus")
     */
    public function index(): Response
    {
        return $this->render('knowus/index.html.twig', [
            'controller_name' => 'KnowusController',
        ]);
    }
}
