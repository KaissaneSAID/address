<?php

namespace App\Controller;

use App\Entity\ADSL;
use App\Repository\ADSLRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ADSLController extends AbstractController
{
    #[Route('/adsl', name: 'app_adsl')]
    public function index(): Response
    {
        $adsl = $this->getDoctrine()->getRepository(ADSL::class)->findAll();
        $searchQuery = "";
        return $this->render('adsl/index.html.twig', [
            'controller_name' => 'ADSLController',
            'adsl'=>$adsl,
            'searchQuery'=> $searchQuery,
        ]);
    }

    #[Route('/recherches', name: 'app_recherches')]

    public function search(Request $request,ADSLRepository $aDSLRepository): Response
    {
        $searchQuery = $request->request->get('q');
        // Si une requête de recherche est effectuée
        if ($searchQuery) {
            // Recherche par nom
            $clientsByBenef = $aDSLRepository->findByBenef($searchQuery);
 
            $adsl = array_merge($clientsByBenef);
        } else {
            $adsl = $aDSLRepository->findAll();
        }
    
        return $this->render('adsl/index.html.twig', [
            'adsl' => $adsl,
            'searchQuery' => $searchQuery,
        ]);
    }
}
