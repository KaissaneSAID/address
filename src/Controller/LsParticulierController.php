<?php

namespace App\Controller;

use App\Entity\Ls;
use App\Repository\LsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LsParticulierController extends AbstractController
{
    #[Route('/lsparticulier', name: 'app_ls_particulier')]
    public function index(): Response
    {
        $searchQuery="";
        $ls = $this->getDoctrine()->getRepository(Ls::class)->findAll();
        return $this->render('ls_particulier/index.html.twig', [
            'controller_name' => 'LsParticulierController',
            'searchQuery' => $searchQuery,
            'ls'=>$ls,

        ]);
    }
    #[Route('/recherche', name: 'app_recherche')]

    public function search(Request $request, LsRepository $lsRepository): Response
    {
        $searchQuery = $request->request->get('q');
        // Si une requête de recherche est effectuée
        if ($searchQuery) {
            // Recherche par nom
            $clientsByBenef = $lsRepository->findByBenef($searchQuery);
 
            $ls = array_merge($clientsByBenef);
        } else {
            $ls = $lsRepository->findAll();
        }
    
        return $this->render('ls_particulier/index.html.twig', [
            'ls' => $ls,
            'searchQuery' => $searchQuery,
        ]);
    }
}
