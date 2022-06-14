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
        $members = ['Corey Taylor'=>'1973', 'Alessandro Venturella'=>'1984', 
        'Jay Weinberg'=>'1980', 'Shawn Crahan'=>'1969', 
        'Craig Jones'=>'1971', 'Mick Thomson'=>'1982', 
        'Sid Wilson'=>'1976', 'James Root'=>'1971', 'Michael Pfaff'=>'1968',
        'James Hetfield'=>'1969','Lars Ulrich'=>'1969', 
        'Kirk Hammett'=>'1968','Robert Trujillo'=>'1970',
        'Ville Viljanen'=>'1980','Andy Gilion'=>'1976',
        'Teemu Heinola'=>'1974','Mikko Sipola'=>'1980',
        'Andreas Kisser'=>'1980','Derrick Green'=>'1975',
        'Paulo Jr.'=>'1968','Eloy Casagrande'=>'1991'
    ];
    
        foreach ($members as $member => $date) {
            $member = (new Member())
                ->setName($member)
                ->setDate(new \DateTime($date));
            $manager->persist($member);
        }
        $manager->flush();
    }
}