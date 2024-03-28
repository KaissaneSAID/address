<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GClientsController extends AbstractController
{
    #[Route('/gclients', name: 'app_g_clients')]
    public function index(): Response
    {
        return $this->render('pages/Gclients.html.twig', [
            'controller_name' => 'GClientsController',
        ]);
    }
}
