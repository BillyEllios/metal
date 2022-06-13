<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StyleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $style = [];
        $styles = ['Nu Metal', 'Heavy Metal', 'Alternative Metal', 'Groove Metal', 'Melodic Death Metal', 'Trash Metal', 'Death Metal', 'Black Metal', 'Speed Metal'];
        
        for ($i = 0; $i < count($styles); $i++) {
            $style[] = (new Style())
                ->setName($styles[$i]);
            $manager->persist($style[$i]);
        }
        $manager->flush();
    }
}