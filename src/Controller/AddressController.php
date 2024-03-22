<?php

namespace App\Controller;

use App\Entity\PlanAddress;
use App\Repository\AddressRepository;
use App\Repository\PlanAddressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddressController extends AbstractController
{
    #[Route('/address', name: 'app_address')]
    public function index(): Response
    {
        $address = $this->getDoctrine()->getRepository(PlanAddress::class)->findAll();
        $searchQuery ="";
        return $this->render('pages/PlanAdresse.html.twig', [
            'controller_name' => 'AddressController',
            'address' => $address,
            'searchQuery' =>$searchQuery
        ]);
    }
    #[Route('/recherche', name: 'app_recherche')]

    public function search(Request $request, PlanAddressRepository $planAddressRepository): Response
    {
        $searchQuery = $request->request->get('q');
        // Si une requête de recherche est effectuée
        if ($searchQuery) {
            // Recherche par nom
            $addressReceveur = $planAddressRepository->findByReceveur($searchQuery);
            
            // Recherche par adresse IP
            $addressReseau = $planAddressRepository->findByAddress($searchQuery);
    
            // Fusionner les résultats des deux recherches
            $address = array_merge($addressReceveur,$addressReseau);
        } else {
            // Si aucune requête de recherche n'est effectuée, afficher tous les clients
            $address = $planAddressRepository->findAll();
        }
    
        return $this->render('pages/PlanAdresse.html.twig', [
            'address' => $address,
            'searchQuery' => $searchQuery
        ]);
    }
}
