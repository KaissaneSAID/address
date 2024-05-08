<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeberegementController extends AbstractController
{
    #[Route('/heberegement', name: 'app_heberegement')]
    public function index(): Response
    {
        return $this->render('nomdomaine/index.html.twig', [
            'controller_name' => 'HeberegementController',
        ]);
    }
}
