<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PersonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
          $person1 = new Person();
          $person1->setImage('')
              ->setUser($this->getReference(UserFixtures::USER_PABLO));
          $manager->persist($person1);


          $person2 = new Person();
          $person2->setImage('')
              ->setUser($this->getReference(UserFixtures::USER_SALOME));
          $manager->persist($person2);


          $person3 = new Person();
          $person3->setImage('')
              ->setUser($this->getReference(UserFixtures::USER_REGLASS));
          $manager->persist($person3);

          $person4 = new Person();
          $person4->setImage('')
              ->setUser($this->getReference(UserFixtures::USER_RICO));
          $manager->persist($person4);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
