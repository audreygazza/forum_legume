<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    //méthode pour hacher le mot de passe
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
      $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user1 = new User();
        $user1 -> setEmail("oceane.allix@outlook.com")
         -> setPseudo("Pablo")
         -> setPassword($this->passwordEncoder->encodePassword($user1, "blingbling"));

         $user2 = new User();
         $user2 -> setEmail("oceane.allix@outlook.com")
          -> setPseudo("Salome")
          -> setPassword($this->passwordEncoder->encodePassword($user2, "bling"));

          $user3 = new User();
          $user3 -> setEmail("oceane.allix@outlook.com")
           -> setPseudo("regl@ss")
           -> setPassword($this->passwordEncoder->encodePassword($user3, "bling"));

        $manager->flush();
    }
}
