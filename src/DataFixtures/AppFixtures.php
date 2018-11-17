<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //$manager->flush();
    }
}
