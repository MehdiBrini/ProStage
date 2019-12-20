<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;

class TestEntreprise extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $PangolinWeb = new Entreprise();
        $PangolinWeb->setNom("Pangolin Web");
        $PangolinWeb->setSiegeSocial("Anglet");
        $PangolinWeb->setSiteWeb("www.pangolin-web.fr");
        $PangolinWeb->setNumTel("0559547369");
        $PangolinWeb->setAdresseMail("contact@pangolin-web.fr");

        $manager->persist($PangolinWeb);

        $manager->flush();
    }
}
