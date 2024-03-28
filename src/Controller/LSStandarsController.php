<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LSStandarsController extends AbstractController
{
    #[Route('/lsstandars', name: 'app_ls_standars')]
    public function index(): Response
    {
        return $this->render('ls_standars/index.html.twig', [
            'controller_name' => 'LSStandarsController',
        ]);
    }
}
