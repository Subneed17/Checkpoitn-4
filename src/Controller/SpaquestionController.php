<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpaquestionController extends AbstractController
{
    /**
     * @Route("/spaquestion", name="spaquestion")
     */
    public function index(): Response
    {
        return $this->render('spaquestion/index.html.twig', [
            'controller_name' => 'SpaquestionController',
        ]);
    }
}
