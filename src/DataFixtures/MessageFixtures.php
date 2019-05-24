<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Message;

class MessageFixtures extends Fixture implements DependentFixtureInterface
{
    const MESSAGE_AMAP = 'msg1';
    const MESSAGE_ALERTE = 'msg2';
    const MESSAGE_DRIVE = 'msg3';
    const MESSAGE_SUPERALIMENTS = 'msg4';


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $message1 = new Message();
        $message1 -> setTitle("Les AMAP, le drive des écolos")
         -> setContent("Bonjour, un premier coup de coeur pour ma nouvelle découverte : le système des AMAP ! Cela permet de consommer local, bio et zero dechet sans avoir besoin de me déplacer. C'est une sorte de drive super écolo et super pratique. En plus cela permet de parler avec les producteurs.")
         ->setUser($this->getReference(UserFixtures::USER_PABLO))
         ->setDiscussion($this->getReference(DiscussionFixtures::DISCUSSION_AMAP));
         $manager->persist($message1);

        $message2 = new Message();
        $message2 -> setTitle("Alerte au surremballage !!")
       -> setContent("Bonjour, un premier coup de gueule sur votre site. Cela concerne le suremballage des produits bio. C'est outrageant, je dénonce une véritable hypocrisie de la part des industriels et des marques qui vendent très bien leur greenbashing. Il faut boycotter ces marques qui vous vendent du sans pesticide et du 100% plastique.")
       ->setUser($this->getReference(UserFixtures::USER_SALOME))
       ->setDiscussion($this->getReference(DiscussionFixtures::DISCUSSION_ALERTE));
       $manager->persist($message2);

       $message3 = new Message();
       $message3 -> setTitle("Le drive tout nu, un nouveau concept store")
      -> setContent("Le Drive tout nu est le premier Drive 0 déchet/100% responsable. Il vous offre la possibilité de faire vos courses quotidiennes via un Drive 0 déchet, pratique et économique ! C'est génial, à tester et à re-tester.")
      ->setUser($this->getReference(UserFixtures::USER_REGLASS))
      ->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_DRIVE));
      $manager->persist($message3);

      $message4 = new Message();
      $message4 -> setTitle("Les superaliments ou les aliments miracles")
     -> setContent("Avez-vous entendu parler des superaliments ? Ces aliments qui possèderaient des valeurs nutritives et qualités protectrices reconnues comme exceptionnelles ?")
     ->setUser($this->getReference(UserFixtures::USER_REGLASS))
     ->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_SUPERALIMENTS));
     $manager->persist($message4);

        $manager->flush();

        $this->addReference(self::MESSAGE_AMAP, $message1);
        $this->addReference(self::MESSAGE_ALERTE, $message2);
        $this->addReference(self::MESSAGE_DRIVE, $message3);
        $this->addReference(self::MESSAGE_SUPERALIMENTS, $message4);
    }

    /**
    * @return array
    */

    public function getDependencies()
    {
      return [
        UserFixtures::class,
        DiscussionFixtures::class,
      ];
    }
}
