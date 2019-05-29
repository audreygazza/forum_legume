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
  const DISCUSSION_LEMARCHE = 'disc6';
  const DISCUSSION_BARQUETTE = 'disc7';
  const DISCUSSION_RADIATION = 'disc8';
  const DISCUSSION_GREENBASHING = 'disc9';
  const DISCUSSION_ZERODECHET = 'disc10';
  const DISCUSSION_MARQUESETHIC = 'disc11';
  const DISCUSSION_TAWASHI = 'disc12';










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

        $discussion6 = new Discussion();
        $discussion6->setTitle("Les marchés")
          ->setTheme($this->getReference(ThemeFixtures::THEME_CONSEILS));

        $manager->persist($discussion6);

        $discussion7 = new Discussion();
        $discussion7->setTitle("les fruits en barquette du supermarché")
          ->setTheme($this->getReference(ThemeFixtures::THEME_GUEULE));

        $manager->persist($discussion7);

        $discussion8 = new Discussion();
        $discussion8->setTitle("Des Fruits irradiés en supermarché")
          ->setTheme($this->getReference(ThemeFixtures::THEME_GUEULE));

        $manager->persist($discussion8);

        $discussion9 = new Discussion();
        $discussion9->setTitle("Les faux labels bio ou le greenbashing")
          ->setTheme($this->getReference(ThemeFixtures::THEME_AVIS));

        $manager->persist($discussion9);

        $discussion10 = new Discussion();
        $discussion10->setTitle("Les Boutiques Zero Dechet")
          ->setTheme($this->getReference(ThemeFixtures::THEME_PLANS));

        $manager->persist($discussion10);

        $discussion11 = new Discussion();
        $discussion11->setTitle("Marques de nourriture ethic en supermarche ? ")
          ->setTheme($this->getReference(ThemeFixtures::THEME_AVIS));

        $manager->persist($discussion11);

        $discussion12 = new Discussion();
        $discussion12->setTitle("Les tawashi ou les éponges maison 0dechet ")
          ->setTheme($this->getReference(ThemeFixtures::THEME_CONSEILS));

        $manager->persist($discussion12);

        $manager->flush();

        $this->addReference(self::DISCUSSION_AMAP, $discussion1);
        $this->addReference(self::DISCUSSION_ALERTE, $discussion2);
        $this->addReference(self::DISCUSSION_DRIVE, $discussion3);
        $this->addReference(self::DISCUSSION_SUPERALIMENTS, $discussion4);
        $this->addReference(self::DISCUSSION_ALIMENTSSAINS, $discussion5);
        $this->addReference(self::DISCUSSION_LEMARCHE, $discussion6);
        $this->addReference(self::DISCUSSION_BARQUETTE, $discussion7);
        $this->addReference(self::DISCUSSION_RADIATION, $discussion8);
        $this->addReference(self::DISCUSSION_GREENBASHING, $discussion9);
        $this->addReference(self::DISCUSSION_ZERODECHET, $discussion10);
        $this->addReference(self::DISCUSSION_MARQUESETHIC, $discussion11);
        $this->addReference(self::DISCUSSION_TAWASHI, $discussion12);








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
