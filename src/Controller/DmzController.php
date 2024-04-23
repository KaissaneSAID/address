<?php

namespace App\Controller;

use App\Entity\Dmz;
use App\Repository\DmzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DmzController extends AbstractController
{
    #[Route('/dmz', name: 'app_dmz')]
    public function index(): Response
    {
        $searchQuery="";
        $dmz = $this->getDoctrine()->getRepository(Dmz::class)->findAll();
        $searchQuery = "";
        return $this->render('dmz/index.html.twig', [
            'controller_name' => 'DmzController',
            'dmz'=>$dmz,
            'searchQuery'=> $searchQuery,
        ]);
    }

    #[Route('/recherches', name: 'app_recherches')]

    public function search(Request $request,DmzRepository $dmzRepository): Response
    {
        $searchQuery = $request->request->get('q');
        // Si une requête de recherche est effectuée
        if ($searchQuery) {
            // Recherche par nom
            $clientsByBenef = $dmzRepository->findByBenef($searchQuery);
 
            $dmz = array_merge($clientsByBenef);
        } else {
            $dmz = $dmzRepository->findAll();
        }
    
        return $this->render('adsl/index.html.twig', [
            'dmz' => $dmz,
            'searchQuery' => $searchQuery,
        ]);
    }
}
