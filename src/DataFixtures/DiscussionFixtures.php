<?php

namespace App\DataFixtures;

use App\Entity\Discussion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DiscussionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $discussion1 = new Discussion();
        $discussion1->setTitle("Les AMAP, le drive des écolos");

        $manager->persist($discussion1);

        $discussion2 = new Discussion();
        $discussion2->setTitle("Alerte au surremballage !!");

        $manager->persist($discussion2);

        $discussion3 = new Discussion();
        $discussion3->setTitle("Le drive tout nu, un nouveau concept store");

        $manager->persist($discussion3);

        $manager->flush();
    }
}
