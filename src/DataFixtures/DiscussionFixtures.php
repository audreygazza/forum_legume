<?php

namespace App\DataFixtures;

use App\Entity\Discussion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DiscussionFixtures extends Fixture implements DependentFixtureInterface
{
  const DISCUSSION_AMAP = 'disc1';
  const DISCUSSION_ALERTE = 'disc2';
  const DISCUSSION_DRIVE = 'disc3';
  const DISCUSSION_SUPERALIMENTS = 'disc4';
  const DISCUSSION_ALIMENTSSAINS = 'disc5';



    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $discussion1 = new Discussion();
        $discussion1->setTitle("Les AMAP, le drive des écolos")
          ->setTheme($this->getReference(ThemeFixtures::THEME_COEUR));

        $manager->persist($discussion1);

        $discussion2 = new Discussion();
        $discussion2->setTitle("Alerte au surremballage !!")
          ->setTheme($this->getReference(ThemeFixtures::THEME_GUEULE));

        $manager->persist($discussion2);

        $discussion3 = new Discussion();
        $discussion3->setTitle("Le drive tout nu, un nouveau concept store")
          ->setTheme($this->getReference(ThemeFixtures::THEME_PLANS));

        $manager->persist($discussion3);

        $discussion4 = new Discussion();
        $discussion4->setTitle("Les superaliments ou les aliments miracles")
          ->setTheme($this->getReference(ThemeFixtures::THEME_COEUR));

        $manager->persist($discussion4);

        $discussion5 = new Discussion();
        $discussion5->setTitle("Aliments sains")
          ->setTheme($this->getReference(ThemeFixtures::THEME_COEUR));

        $manager->persist($discussion5);

        $manager->flush();

        $this->addReference(self::DISCUSSION_AMAP, $discussion1);
        $this->addReference(self::DISCUSSION_ALERTE, $discussion2);
        $this->addReference(self::DISCUSSION_DRIVE, $discussion3);
        $this->addReference(self::DISCUSSION_SUPERALIMENTS, $discussion4);
        $this->addReference(self::DISCUSSION_ALIMENTSSAINS, $discussion5);



    }

    /**
    * @return array
    */

    public function getDependencies()
    {
      return [
        ThemeFixtures::class,
      ];
    }

}
