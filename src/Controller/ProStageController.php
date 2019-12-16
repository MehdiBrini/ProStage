<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    
    public function index()
    {
        return $this->render('pro_stage/index.html.twig');
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
