<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Message;

class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $message1 = new Message();
        $message1 -> setTitle("Les AMAP, le drive des ecolos")
         -> setContent("Bonjour, un premier coup de coeur pour ma nouvelle découverte : le systhème des AMAP ! Cela permet de consommer local, bio et zero dechet sans avoir besoin de me déplacer. C'est une sorte de drive super ecolo et super pratique. En plus cela permet de parler avec les producteurs.");

         $manager->persist($message1);


        $message2 = new Message();
        $message2 -> setTitle("Alerte au suremballage!!")
       -> setContent("Bonjour, un premier coup de gueule sur votre site. Cela concerne le suremballage des produits bio. C'est outrageant, je dénonce une véritable hypocrisie de la part des industriels et des marques qui vendent très bien leur greenbashing. Il faud boycotter ces marques qui vous vendent du sans pesticide et du plastique.");

       $manager->persist($message2);

       $message2 = new Message();
       $message2 -> setTitle("Le drive Tout nu, un ouveau concept store")
      -> setContent("Le Drive tout nu est le premier Drive 0 déchet/100% responsable. Il vous offre la possibilité de faire vos courses quotidiennes via un Drive 0 déchet, pratique et économique ! C'est génial, à tester et à re-tester.");

      $manager->persist($message3);

        $manager->flush();
    }
}
