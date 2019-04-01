<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user1 = new User();
        $user1 -> setEmail("oceane.allix@outlook.com")
         -> setPseudo("Pablo")
         -> setPassword("blingbling");

         $user2 = new User();
         $user2 -> setEmail("oceane.allix@outlook.com")
          -> setPseudo("Salome")
          -> setPassword("bling");

          $user3 = new User();
          $user3 -> setEmail("oceane.allix@outlook.com")
           -> setPseudo("regl@ss")
           -> setPassword("bling");

        $manager->flush();
    }
}
