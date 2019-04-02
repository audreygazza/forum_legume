<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    const USER_PABLO = 'Pablo';
    const USER_SALOME = 'Salome';
    const USER_REGLASS = 'Reglass';

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
        $user1 -> setEmail("gazzaaudrey@gmail.com")
         -> setPseudo("Pablo")
         -> setRoles(['ROLE_ADMIN'])
         -> setPassword($this->passwordEncoder->encodePassword($user1, "blingbling"));
         $manager->persist($user1);

         $user2 = new User();
         $user2 -> setEmail("ttaourirt@live.fr")
          -> setPseudo("Salome")
          -> setRoles(['ROLE_MODERATOR'])
          -> setPassword($this->passwordEncoder->encodePassword($user2, "bling"));
          $manager->persist($user2);

          $user3 = new User();
          $user3 -> setEmail("oceane.allix@outlook.com")
           -> setPseudo("reglass")
           -> setRoles(['ROLE_USER'])
           -> setPassword($this->passwordEncoder->encodePassword($user3, "bling"));
           $manager->persist($user3);

          $manager->flush();

          $this->addReference(self::USER_PABLO, $user1);
          $this->addReference(self::USER_SALOME, $user2);
          $this->addReference(self::USER_REGLASS, $user3);

    }
}
