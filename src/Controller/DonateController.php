<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/donate")
 */
class DonateController extends AbstractController
{
    /**
     * @Route("/", name="donate")
     */
    public function index(): Response
    {
        return $this->render('donate/index.html.twig', [
            'controller_name' => 'DonateController',
        ]);
    }

        /**
     * @Route("/formulaire", name="donate_formulaire")
     */
    public function show(): Response
    {
        return $this->render('donate/show.html.twig', [
            'controller_name' => 'DonateController',
        ]);
    }
}
