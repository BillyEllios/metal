<?php
namespace App\DataFixtures;

use App\Entity\Band;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BandFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $band = [];
        $bands = ['Slipknot' => '1995', 'Metallica' => '1981', 'Mors Principium Est' => '2003', 'Sepultura' => '1998'];
        // create 20 products! Bam!
        foreach ($bands as $band => $date) {
            $band = (new Band())
                ->setName($band)
                ->setDate(new \DateTime($date));
            $manager->persist($band);
        }

        $manager->flush();
    }
}