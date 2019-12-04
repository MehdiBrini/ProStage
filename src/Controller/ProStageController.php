<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage_accueil")
     */
    public function index()
    {
        return $this->render('pro_stage/index.html.twig');
    }

    /**
     * @Route("/entreprises", name="pro_stage_entreprises")
     */
    public function afficherEntreprises()
    { 
        return $this->render('pro_stage/affichageEntreprise.html.twig');
    }

    /**
     * @Route("/formations", name="pro_stage_formations")
     */
    public function afficherFormations()
    { 
        return $this->render('pro_stage/affichageFormations.html.twig');
    }

     /**
     * @Route("/stages/{leID}", name="pro_stage_stages")
     */
    public function afficherStages($leID)
    { 
        return $this->render('pro_stage/affichageStages.html.twig', ['idStage'=> $leID]);
    }

}
