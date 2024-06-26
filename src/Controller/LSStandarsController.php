<?php

namespace App\Controller;

use App\Entity\Ls;
use App\Repository\LsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LSStandarsController extends AbstractController
{
    #[Route('/lsstandars', name: 'app_ls_standars')]
    public function index(): Response
    {
        $searchQuery="";

        $ls = $this->getDoctrine()->getRepository(Ls::class)->findAll();

        return $this->render('ls_standars/index.html.twig', [
            'controller_name' => 'LSStandarsController',
            'searchQuery' => $searchQuery,
            'ls'=>$ls,
        ]);
    }

    #[Route('/search', name: 'app_search')]

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
    
        return $this->render('ls_standars/index.html.twig', [
            'ls' => $ls,
            'searchQuery' => $searchQuery,
        ]);
    }
}
