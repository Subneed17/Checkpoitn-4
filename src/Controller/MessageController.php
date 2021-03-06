<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\AnimauxRepository;
use App\Repository\MessageRepository;
use App\Service\Slugify;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/message")
 */
class MessageController extends AbstractController
{
    /**
     * @Route("/index/", name="message_index", methods={"GET"})
     */
    public function index(MessageRepository $messageRepository, AnimauxRepository $animauxRepository): Response
    {
        return $this->render('message/index.html.twig', [
            'messages' => $messageRepository->findAll(),
            // 'animauxes'=> $animauxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id<\d+>}", name="message_new", methods={"GET","POST"})
     */
    public function new(Request $request, Animaux $animaux, Slugify $slugify): Response
    {
        
        $message = new Message();
        $message->setDateMessage(new DateTime('now'));
        $message->setAnimal($animaux);
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
      

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $slug = $slugify->generate($message->getFirstname());
            $message->setSlug($slug);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Votre message a été envoyé aux membres du refuge, veuillez patienter. Nous vous répondrons dans les plus bref délais !');

            return $this->redirectToRoute('accueil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('message/new.html.twig', [
            'message' => $message,
            'animaux' => $animaux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="message_show", methods={"GET"})
     */
    public function show(Message $message): Response
    {
        return $this->render('message/show.html.twig', [
            'message' => $message,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="message_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Message $message): Response
    {
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('message/edit.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="message_delete", methods={"POST"})
     */
    public function delete(Request $request, Message $message): Response
    {
        if ($this->isCsrfTokenValid('delete'.$message->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($message);
            $entityManager->flush();
        }

        return $this->redirectToRoute('message_index', [], Response::HTTP_SEE_OTHER);
    }

}
