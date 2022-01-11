<?php

namespace App\Controller;

use App\Entity\Adopter;
use App\Form\AdopterType;
use App\Repository\AdopterRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adopter")
 */
class AdopterController extends AbstractController
{
    /**
     * @Route("/", name="adopter", methods={"GET"})
     */
    public function index(AdopterRepository $adopterRepository): Response
    {
        if($this->getUser()) {

        
            if ($this->getUser()->getRoles()[0] === "ROLE_ADMIN") {
                $adopter = $adopterRepository->findAll();
            } else {
                $adopter = $adopterRepository->findBy(['isValid' => 'true']);
            }

        } else {
            $adopter = $adopterRepository->findBy(['isValid' => 'true']);
        }

        // if ($_SESSION['roles'] === ["ROLE_ADMIN"]) {
        //     $adopter = $adopterRepository->findAll();
        // } else {
        //     $adopter = $adopterRepository->findBy(['isValid'=> 'true']);
        // }

        return $this->render('adopter/index.html.twig', [
            'adopters' => $adopter,
        ]);
    }

    /**
     * @Route("/new", name="adopter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adopter = new Adopter();
        $adopter->setCaptureAt(new DateTime('now'));
        $form = $this->createForm(AdopterType::class, $adopter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adopter);
            $entityManager->flush();

            return $this->redirectToRoute('adopter', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adopter/new.html.twig', [
            'adopter' => $adopter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adopter_show", methods={"GET"})
     */
    public function show(Adopter $adopter): Response
    {
        return $this->render('adopter/show.html.twig', [
            'adopter' => $adopter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adopter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adopter $adopter): Response
    {
        $form = $this->createForm(AdopterType::class, $adopter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adopter', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adopter/edit.html.twig', [
            'adopter' => $adopter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adopter_delete", methods={"POST"})
     */
    public function delete(Request $request, Adopter $adopter): Response
    {
        if ($this->isCsrfTokenValid('delete' . $adopter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adopter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adopter', [], Response::HTTP_SEE_OTHER);
    }
    


            /**
     * @Route("/actif/{id}", name="adopter_actif", methods={"GET"})
     */
    public function actif(Adopter $adopter): Response
    {
        if($adopter->getIsValid() === true) {
            $adopter->setIsValid(false);
        } else {
            $adopter->setIsValid(true);
        }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

        return $this->redirectToRoute('adopter', [], Response::HTTP_SEE_OTHER);
    }
}
