<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;

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
        return $this->render('pro_stage/affichageEntreprise.html.twig');
    }

   
    public function afficherFormations()
    { 
        return $this->render('pro_stage/affichageFormations.html.twig');
    }


    public function afficherStages($leID)
    { 
        return $this->render('pro_stage/affichageStages.html.twig', ['idStage'=> $leID]);
    }

}
