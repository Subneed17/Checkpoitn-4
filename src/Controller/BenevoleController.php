<?php

namespace App\Controller;

use App\Entity\Benevole;
use App\Form\Benevole1Type;
use App\Repository\BenevoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/benevole")
 */
class BenevoleController extends AbstractController
{
    /**
     * @Route("/", name="benevole_index", methods={"GET"})
     */
    public function index(BenevoleRepository $benevoleRepository): Response
    {
        return $this->render('benevole/index.html.twig', [
            'benevoles' => $benevoleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="benevole_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $benevole = new Benevole();
        $form = $this->createForm(Benevole1Type::class, $benevole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($benevole);
            $entityManager->flush();

            return $this->redirectToRoute('benevole_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('benevole/new.html.twig', [
            'benevole' => $benevole,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="benevole_show", methods={"GET"})
     */
    public function show(Benevole $benevole): Response
    {
        return $this->render('benevole/show.html.twig', [
            'benevole' => $benevole,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="benevole_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Benevole $benevole): Response
    {
        $form = $this->createForm(Benevole1Type::class, $benevole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('benevole_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('benevole/edit.html.twig', [
            'benevole' => $benevole,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="benevole_delete", methods={"POST"})
     */
    public function delete(Request $request, Benevole $benevole): Response
    {
        if ($this->isCsrfTokenValid('delete'.$benevole->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($benevole);
            $entityManager->flush();
        }

        return $this->redirectToRoute('benevole_index', [], Response::HTTP_SEE_OTHER);
    }
}
