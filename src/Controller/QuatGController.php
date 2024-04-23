<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuatGController extends AbstractController
{
    #[Route('/quatg', name: 'app_quat_g')]
    public function index(): Response
    {
        return $this->render('quat_g/index.html.twig', [
            'controller_name' => 'QuatGController',
        ]);
    }
}
