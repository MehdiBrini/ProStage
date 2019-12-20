<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Stage;

class TestStage extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $StageDevWeb = new Stage();
         $StageDevWeb->setIdStage(1);
         $StageDevWeb->setIntitule("Stage en developpement web sous Symfony");
         $StageDevWeb->setDomaine("Developpement Web");
         $StageDevWeb->setNomEntreprise("Pangolin Web");
         $StageDevWeb->setFormation("DUT Informatique");
         $StageDevWeb->setLieu("Anglet");
         $StageDevWeb->setContactMail("contact@PangolinWeb.fr");
         $


         $manager->persist($StageDevWeb);

        $manager->flush();
        
        
    }
}
