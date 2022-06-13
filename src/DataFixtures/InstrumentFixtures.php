<?php

namespace App\DataFixtures;

use App\Entity\Instrument;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InstrumentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $instrument = [];
        $instruments = ['Guitar', 'Bass Guitar', 'Drums', 'Synth'];
        
        for ($i = 0; $i < count($instruments); $i++) {
            $instrument[] = (new Instrument())
                ->setName($instruments[$i]);
            $manager->persist($instrument[$i]);
        }
        $manager->flush();
    }
}