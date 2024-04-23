<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\AddressRepository;
use App\Repository\ADSLRepository;
use App\Repository\ClientRepository;
use App\Repository\LsRepository;
use App\Repository\PlanAddressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DhashbordController extends AbstractController
{
    #[Route('/', name: 'app_dhashbord')]
    public function totalClients(ClientRepository $clientRepository,ADSLRepository $aDSLRepository,LsRepository $lsRepository): Response
    {
        // Comptez le nombre total de clients
        $totalClients = $clientRepository->count([]);
        $totalClientsBLR = $clientRepository->count(['typeConnexion' => '2']);
        $totalAdressLibreLS = $lsRepository->count(['beneficiaire' => 'LIBRE']);
        $totalAdressLibreADSL = $aDSLRepository->count(['beneficiaire' => 'LIBRE']);
        $totalClientsLS = $lsRepository->createQueryBuilder('ls')
            ->select('COUNT(ls.id)')
            ->andWhere('ls.beneficiaire != :libre')
            ->setParameter('libre', 'LIBRE')
            ->getQuery()
            ->getSingleScalarResult();
        
            $totalClientsADSL = $aDSLRepository->createQueryBuilder('adsl')
            ->select('COUNT(adsl.id)')
            ->andWhere('adsl.beneficiaire != :libre')
            ->setParameter('libre', 'LIBRE')
            ->getQuery()
            ->getSingleScalarResult();
        
        // Affichez le nombre total de clients
        return $this->render('pages/dhashbord.html.twig', [
            'totalClients' => $totalClients,
            'totalClientsADSL' =>$totalClientsADSL,
            'totalClientsBLR' =>$totalClientsBLR,
            'totalClientsLS' =>$totalClientsLS,
            'totalAdressLibreLS' =>$totalAdressLibreLS,
            'totalAdressLibreADSL' =>$totalAdressLibreADSL,
        ]);
    }
}
