<?php

namespace App\Controller;

use App\Entity\Cadministratif;
use App\Entity\CTechnique;
use App\Entity\Formulaire;
use App\Entity\OrganismDemandeur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulDomaineController extends AbstractController
{
    #[Route('/formul/domaine', name: 'app_formul_domaine')]
    public function index(): Response
    {
        return $this->render('formul_domaine/index.html.twig', [
            'controller_name' => 'FormulDomaineController',
        ]);
    }
    #[Route('/forminsert', name: 'app_forminsert')]

    public function insert(Request $request){
        $OrganismDemandeur = $this->getDoctrine()->getRepository(OrganismDemandeur::class)->find($request->request->get('NomDemande'));
        $OrganismDemandeur = $this->getDoctrine()->getRepository(OrganismDemandeur::class)->find($request->request->get('sigleDemande'));
        $OrganismDemandeur = $this->getDoctrine()->getRepository(OrganismDemandeur::class)->find($request->request->get('addresseDemande'));
        $OrganismDemandeur = $this->getDoctrine()->getRepository(OrganismDemandeur::class)->find($request->request->get('villeDemande'));
        $OrganismDemandeur = $this->getDoctrine()->getRepository(OrganismDemandeur::class)->find($request->request->get('boiteDemande'));
        $OrganismDemandeur = $this->getDoctrine()->getRepository(OrganismDemandeur::class)->find($request->request->get('paysDemande'));
        $OrganismDemandeur = $this->getDoctrine()->getRepository(OrganismDemandeur::class)->find($request->request->get('juridique'));


        $client = new Formulaire();

        $client->setNomDomaineComplet($request->request->get('nomDomaine'));
        $client->setPieceJustif($request->request->get('recepisse'));
        $client->setPieceJustif($request->request->get('patente'));
        $client->setPieceJustif($request->request->get('decret'));
        $client->setPieceJustif($request->request->get('arrete'));
        $client->setPieceJustif($request->request->get('autre'));
        $client->setPieceJustif($request->request->get('autorisation'));
        $client->setPieceJustif($request->request->get('statuts'));
        $client->setFilPiece($request->request->get('fichier'));
        $client->setFacture($request->request->get('facture'));
        $client->setOrganisme($OrganismDemandeur);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($client);
        $entityManager->flush();

        return $this->redirectToRoute('app_client');
    }
}
