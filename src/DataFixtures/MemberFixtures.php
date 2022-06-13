<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MemberFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $member = [];
        $date = [];
        $members = ['Corey Taylor', 'Alessandro Venturella', 'Jay Weinberg', 'Shawn Crahan', 'Craig Jones', 'Mick Thomson', 'Sid Wilson', 'James Root', 'Michael Pfaff'];
        $dates = ['1973','1984','1980','1969',''];
    
        for ($i = 0; $i < $members; $i++) {
            $member = (new Member())
                ->setName($members[$i])
                ->setDate(new \DateTime($dates[$i]));
            $manager->persist($member);
        }

        $manager->flush();
    }
}