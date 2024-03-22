<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\PlanAddress;
use App\Entity\TypeConnexion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function index(): Response
    {
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }

    #[Route('/from', name: 'app_from')]
    public function xslx(Request $request)
{
   $file = $request->files->get('file'); // get the file from the sent request
   
   $fileFolder = __DIR__ . '/../../public/uploads/';  //choose the folder in which the uploaded file will be stored
  
   $filePathName = md5(uniqid()) . $file->getClientOriginalName();
      // apply md5 function to generate an unique identifier for the file and concat it with the file extension  
            try {
                $file->move($fileFolder, $filePathName);
            } catch (FileException $e) {
                dd($e);
            }
    $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file 
    $row = $spreadsheet->getActiveSheet()->removeRow(1); // I added this to be able to remove the first file line 
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); // here, the read data is turned into an array
   
    $entityManager = $this->getDoctrine()->getManager(); 
    foreach ($sheetData as $Row) 
        { 


            $numdossier = $Row['B']; // store the first_name on each iteration 
            $nom = $Row['C']; // store the last_name on each iteration
            $contact= $Row['D'];     // store the email on each iteration
            $localite = $Row['E'];   // store the phone on each iteration
            $addressip = $Row['F'];   // store the phone on each iteration
            $masque = $Row['G']; 
            $passerelle = $Row['H'];   // store the phone on each iteration
            // store the phone on each iteration
            if($Row['I'] == "LS"){
                $typeconn = 3;
            }elseif ($Row['I'] == "ADSL") {
                $typeconn = 1;
            }elseif($Row['I'] == "BLR"){
                $typeconn = 2;
            }
            // store the phone on each iteration
            $date = $Row['J'];   // store the phone on each iteration
               
                $planaddress = new Client(); 
                $planaddress->setNDossier($numdossier);
                $planaddress->setNom($nom);
                $planaddress->setLocalite($localite);
                $planaddress->setContacts($contact);
                $planaddress->setIpaddress($addressip);
                $planaddress->setMasque($masque);
                $planaddress->setPasserelle($passerelle);
                $planaddress->setTypeConnexion($typeconn);
                $planaddress->setDate($date);
                $entityManager->persist($planaddress); 
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($planaddress);
                $entityManager->flush(); 
                 // here Doctrine checks all the fields of all fetched data and make a transaction to the database.
             } 
             return $this->redirectToRoute('app_client');
        } 

}

