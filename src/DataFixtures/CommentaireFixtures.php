<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentaireFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        // $product = new Product();
        // $manager->persist($product);
        $commentaire1 = new Commentaire();
        $commentaire1-> setContent("Les fruits ont tout de suite plus de saveurs quand on sait d'où ils viennent :)")
        ->setUser($this->getReference(UserFixtures::USER_SALOME))
        ->setMessage($this->getReference(MessageFixtures::MESSAGE_AMAP));

        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2-> setContent("Et j'ai même appris récemment que pour garder les fruits et les légumes plus longtemps les supermarchés les exposent à des radiations qui sont extrêmement cancérigènes. Ils transforment même le bio en poison.")
        ->setUser($this->getReference(UserFixtures::USER_REGLASS))
        ->setMessage($this->getReference(MessageFixtures::MESSAGE_ALERTE));

        $manager->persist($commentaire2);

        $commentaire3 = new Commentaire();
        $commentaire3-> setContent("Ah oui je connais, c'est trop bien j'y vais souvent !! Il font même des cosmétiques et des produits ménagers.")
        ->setUser($this->getReference(UserFixtures::USER_PABLO))
        ->setMessage($this->getReference(MessageFixtures::MESSAGE_DRIVE));

        $manager->persist($commentaire3);

        $manager->flush();

    }

      /**
      *return array
      */
      public function getDependencies ()
      { return [
      	UserFixtures::class,
      	MessageFixtures::class,
      	];
      }

}
