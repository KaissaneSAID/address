<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;
use App\Entity\TypeConnexion;
use App\Entity\User;
use App\Repository\ClientRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class IndexController extends AbstractController
{
  
    #[Route('/client', name: 'app_client')]
    public function index(): Response
    {
        $searchQuery ="";
        $typesConnexion = $this->getDoctrine()->getRepository(TypeConnexion::class)->findAll();
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        return $this->render('pages/client.html.twig', [
            'controller_name' => 'IndexController',
            'clients' => $clients,
            'typesConnexion' =>$typesConnexion,
            'searchQuery' =>$searchQuery
        ]);
    }

    #[Route('/create', name: 'app_create')]
   
    public function create(Request $request): Response
    {
        $typeConnexion = $this->getDoctrine()->getRepository(TypeConnexion::class)->find($request->request->get('typeConnexionId'));

        $client = new Client();

        $client->setNDossier($request->request->get('NDossier'));
        $client->setNom($request->request->get('Nom'));
        $client->setContact($request->request->get('Contact'));
        $client->setLocalite($request->request->get('Localite'));
        $client->setIpaddress($request->request->get('Ipaddress'));
        $client->setMasque($request->request->get('Masque'));
        $client->setTypeConnexion($typeConnexion);
        $client->setPasserelle($request->request->get('Passerelle'));
        $dateEnvoi = new \DateTime();
        $client->setDateAttribue($dateEnvoi);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($client);
        $entityManager->flush();

        return $this->redirectToRoute('app_client');
    }

    #[Route('/search', name: 'app_search')]

    public function search(Request $request, ClientRepository $clientRepository): Response
    {
        $searchQuery = $request->request->get('q');
        $typesConnexion = $this->getDoctrine()->getRepository(TypeConnexion::class)->findAll();
        // Si une requête de recherche est effectuée
        if ($searchQuery) {
            // Recherche par nom
            $clientsByName = $clientRepository->findByNom($searchQuery);
            
            // Recherche par adresse IP
            $clientsByPasserelle = $clientRepository->findByAddress($searchQuery);
    
            // Fusionner les résultats des deux recherches
            $clients = array_merge($clientsByName,$clientsByPasserelle);
        } else {
            // Si aucune requête de recherche n'est effectuée, afficher tous les clients
            $clients = $clientRepository->findAll();
        }
    
        return $this->render('pages/client.html.twig', [
            'clients' => $clients,
            'searchQuery' => $searchQuery,
            'typesConnexion' =>$typesConnexion
        ]);
    }
    #[Route('/client/delete/{id}', name: 'delete_client')]
    public function delete(int $id): Response
    {
        // Charger l'entité Client à partir de l'ID
        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->find($id);

        // Vérifier si le client existe
        if (!$client) {
            throw $this->createNotFoundException('Client non trouvé');
        }

        // Supprimer le client
        $entityManager->remove($client);
        $entityManager->flush();

        // Rediriger ou afficher un message de confirmation
        return $this->redirectToRoute('app_client');
    }
    #[Route('/edit/{id}', name: 'edit_client', methods: ['POST'])]
    public function edit(Request $request, $id): Response
    {
        // Récupérer l'identifiant soumis à partir de la requête
        $clientId = $request->request->get('id');
        
        // Charger l'objet Client correspondant à modifier
        $client = $this->getDoctrine()->getRepository(Client::class)->find($clientId);

        if (!$client) {
            throw $this->createNotFoundException('Client non trouvé');
        }

        // Récupérer les autres données soumises à partir de la requête
        $nom = $request->request->get('nom');
        $contact = $request->request->get('contact');
        // Récupérer d'autres champs du formulaire
        
        // Mettre à jour les propriétés de l'objet Client
        $client->setNom($nom);
        $client->setContact($contact);
        // Mettre à jour d'autres propriétés du Client
        
        // Enregistrer les modifications dans la base de données
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        
        // Rediriger vers une autre page après la modification
        return $this->redirectToRoute('app_client');
    }

}


   

