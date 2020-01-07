<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;

class ProStageController extends AbstractController
{
    
    public function index()
    {
        //Récupérer repository des stages
        $recupStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les stages de la BD
        $lesStages = $recupStage->findAll();

        //Envoyer les stages et les afficher
        return $this->render('pro_stage/index.html.twig', ['unStage'=>$lesStages]);
    }

   
    public function afficherEntreprises()
    { 
        //Récupérer repository des entreprises
        $recupEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les entreprises de la BD
        $lesEntreprises = $recupEntreprise->findAll();

        //Envoyer les entreprises et les afficher
        
        return $this->render('pro_stage/affichageEntreprise.html.twig', ['uneEntreprise'=>$lesEntreprises]);
    }

   
    public function afficherFormations()
    { 
        return $this->render('pro_stage/affichageFormations.html.twig');
    }


    public function afficherStages($leID)
    { 
        //Récupérer repository des stages
        $recupStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les entreprises de la BD
        $leStage = $recupStage->find($leID);

        return $this->render('pro_stage/affichageStages.html.twig', ['elStage'=> $leStage]);
    }

}
