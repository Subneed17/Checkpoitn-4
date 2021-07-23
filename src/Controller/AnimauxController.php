<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Form\AnimauxType;
use App\Repository\AnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animaux")
 */
class AnimauxController extends AbstractController
{
    /**
     * @Route("/", name="animaux_index", methods={"GET"})
     */
    public function index(AnimauxRepository $animauxRepository): Response
    {
        return $this->render('animaux/index.html.twig', [
            'animauxes' => $animauxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="animaux_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $animaux = new Animaux();
        $form = $this->createForm(AnimauxType::class, $animaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($animaux);
            $entityManager->flush();

            return $this->redirectToRoute('animaux_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('animaux/new.html.twig', [
            'animaux' => $animaux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="animaux_show", methods={"GET"})
     */
    public function show(Animaux $animaux): Response
    {
        return $this->render('animaux/show.html.twig', [
            'animaux' => $animaux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="animaux_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Animaux $animaux): Response
    {
        $form = $this->createForm(AnimauxType::class, $animaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('animaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animaux/edit.html.twig', [
            'animaux' => $animaux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="animaux_delete", methods={"POST"})
     */
    public function delete(Request $request, Animaux $animaux): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animaux->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($animaux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('animaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
