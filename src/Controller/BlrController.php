<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlrController extends AbstractController
{
    #[Route('/blr', name: 'app_blr')]
    public function index(): Response
    {
        return $this->render('blr/index.html.twig', [
            'controller_name' => 'BlrController',
        ]);
    }
}
