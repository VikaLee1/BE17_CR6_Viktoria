<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/event')]
class EventCrudController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $events=$doctrine->getRepository(Event:: class)->findAll();
        // dd($events);
        return $this->render('event_crud/index.html.twig', [
           "events"=>$events
        ]);
    }

// create an event 
    #[Route('/create', name: 'create-event')]
    public function createAction(Request $request, ManagerRegistry $doctrine): Response
    {
        $event=new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = $form->getData();

            $em=$doctrine->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('index');
        }

      return $this->render('event_crud/create.html.twig', [
            "form"=>$form->createView()
        ]);
    }

//  edit an event
    #[Route('/edit/{id}', name: 'edit-event')]
    public function editAction($id, Request $request, ManagerRegistry $doctrine): Response
    {
        $event=$doctrine->getRepository(Event::class)->find($id);
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = $form->getData();

            $em=$doctrine->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('index');
        }
        
        return $this->render('event_crud/edit.html.twig', [
            "form" => $form->createView(),
            "event" => $event
        ]);
    }

// details about an event 
   #[Route('/details/{id}', name: 'details-event')]
    public function detailsAction($id, ManagerRegistry $doctrine): Response
    {
        $event = $doctrine->getRepository(Event::class)->find($id);
        
        return $this->render('event_crud/details.html.twig', [
            "event" => $event
        ]);
    }

// delete a record
    #[Route('/delete/{id}', name: 'delete-event')]
    public function deleteAction(ManagerRegistry $doctrine, $id): Response
    {
        $em=$doctrine->getManager();
        $event=$doctrine->getRepository(Event::class)->find($id);
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('index', [
        ]);
    }
}
