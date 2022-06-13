<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $role = [];
        $roles = ['Vocalist', 'Guitarist', 'Bassist', 'Drummer', 'Keyboard Pianist'];
        
        for ($i = 0; $i < count($roles); $i++) {
            $role[] = (new Role())
                ->setName($roles[$i]);
            $manager->persist($role[$i]);
        }
        $manager->flush();
    }
}