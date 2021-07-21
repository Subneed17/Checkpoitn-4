<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OtherController extends AbstractController
{
    /**
     * @Route("/other", name="other")
     */
    public function index(): Response
    {
        return $this->render('other/index.html.twig', [
            'controller_name' => 'OtherController',
        ]);
    }
}
