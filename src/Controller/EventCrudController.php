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

// filter
#[Route('/music', name: 'filter-event1')]
public function filterAction1(ManagerRegistry $doctrine): Response
{
    $musicEvents=$doctrine->getRepository(Event:: class)->findBy(array('type'=>'music'));
   
    return $this->render('event_crud/music.html.twig', [
       "events"=>$musicEvents
    ]);
} 


#[Route('/sport', name: 'filter-event2')]
public function filterAction2(ManagerRegistry $doctrine): Response
{
    $sportEvents=$doctrine->getRepository(Event:: class)->findBy(array('type'=>'sport'));
   
    return $this->render('event_crud/sport.html.twig', [
       "events"=>$sportEvents
    ]);
} 

#[Route('/movie', name: 'filter-event3')]
public function filterAction3(ManagerRegistry $doctrine): Response
{
    $movieEvents=$doctrine->getRepository(Event:: class)->findBy(array('type'=>'movie'));
   
    return $this->render('event_crud/movie.html.twig', [
       "events"=>$movieEvents
    ]);
} 

#[Route('/miscellaneous', name: 'filter-event4')]
public function filterAction4(ManagerRegistry $doctrine): Response
{
    $difEvents=$doctrine->getRepository(Event:: class)->findBy(array('type'=>'miscellaneous'));
   
    return $this->render('event_crud/miscellaneous.html.twig', [
       "events"=>$difEvents
    ]);
} 

}
