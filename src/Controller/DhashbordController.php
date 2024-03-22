<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DhashbordController extends AbstractController
{
    #[Route('/', name: 'app_dhashbord')]
    public function totalClients(ClientRepository $clientRepository): Response
    {
        // Comptez le nombre total de clients
        $totalClients = $clientRepository->count([]);
        
        // Affichez le nombre total de clients
        return $this->render('pages/dhashbord.html.twig', [
            'totalClients' => $totalClients,
        ]);
    }
}
