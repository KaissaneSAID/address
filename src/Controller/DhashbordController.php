<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\AddressRepository;
use App\Repository\ClientRepository;
use App\Repository\PlanAddressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DhashbordController extends AbstractController
{
    #[Route('/', name: 'app_dhashbord')]
    public function totalClients(ClientRepository $clientRepository,PlanAddressRepository $planAddressRepository): Response
    {
        // Comptez le nombre total de clients
        $totalClients = $clientRepository->count([]);
        $totalClientsADSL = $clientRepository->count(['typeConnexion' => '1']);
        $totalClientsBLR = $clientRepository->count(['typeConnexion' => '2']);
        $totalClientsLS = $clientRepository->count(['typeConnexion' => '3']);
        $totalClientsPublique = $clientRepository->count(['typeConnexion' => '5']);
        $totalAdressLibre = $planAddressRepository->count(['receveurclient' => 'libre']);
        
        // Affichez le nombre total de clients
        return $this->render('pages/dhashbord.html.twig', [
            'totalClients' => $totalClients,
            'totalClientsADSL' =>$totalClientsADSL,
            'totalClientsBLR' =>$totalClientsBLR,
            'totalClientsLS' =>$totalClientsLS,
            'totalClientsPublique' =>$totalClientsPublique,
            'totalAdressLibre' =>$totalAdressLibre,
        ]);
    }
}
