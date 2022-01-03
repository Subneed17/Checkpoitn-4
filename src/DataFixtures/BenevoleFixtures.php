<?php

namespace App\DataFixtures;

use App\Entity\Benevole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BenevoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $benevole = new Benevole();
          $benevole->setName('Joris');
          $benevole->setPicture('pbhugccftcfutcf');
          $benevole->setDescription('efzfezfze');
          $benevole->setCaptureAt(new \DateTime('2021/10/22'));
        $manager->persist($benevole);

        $manager->flush();
    }
}
