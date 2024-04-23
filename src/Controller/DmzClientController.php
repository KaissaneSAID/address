<?php

namespace App\Controller;

use App\Entity\DmzClient;
use App\Repository\DmzClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DmzClientController extends AbstractController
{
    #[Route('/dmzclient', name: 'app_dmz_client')]
    public function index(): Response
    {
        $dmz = $this->getDoctrine()->getRepository(DmzClient::class)->findAll();
        $searchQuery = "";
        return $this->render('dmz_client/index.html.twig', [
            'controller_name' => 'DmzClientController',
            'dmz'=>$dmz,
            'searchQuery'=> $searchQuery,
        ]);
    }

    #[Route('/recherches', name: 'app_rech')]

    public function search(Request $request,DmzClientRepository $dmzClientRepository): Response
    {
        $searchQuery = $request->request->get('q');
        // Si une requête de recherche est effectuée
        if ($searchQuery) {
            // Recherche par nom
            $clientsByBenef = $dmzClientRepository->findByBenef($searchQuery);
 
            $dmz = array_merge($clientsByBenef);
        } else {
            $dmz = $dmzClientRepository->findAll();
        }
    
        return $this->render('dmz_client/index.html.twig', [
            'dmz' => $dmz,
            'searchQuery' => $searchQuery,
        ]);
    }
}
