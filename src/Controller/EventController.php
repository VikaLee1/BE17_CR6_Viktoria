<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('event/index.html.twig', [
            
        ]);
    }
}
