<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ThemeFixtures extends Fixture
{
  const THEME_COEUR = 'coeur';
  const THEME_GUEULE = 'gueule';
  const THEME_PLANS = 'plans';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $theme1 = new Theme();
        $theme1 -> setName("Coup d'coeur conso")
                -> setDescription("Partagez vos coups de coeurs cuisine, légumes ou producteurs.");

        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2 -> setName("Coup d'gueule conso")
                -> setDescription("Vous avez repéré des arnaques ou des produits de mauvaise qualités, faites-en part !!");

        $manager->persist($theme2);

        $theme3 = new Theme();
        $theme3 -> setName("Bons plans")
                -> setDescription("Partagez ici les bons plans que vous avez repéré.");

        $manager->persist($theme3);

        $manager->flush();

        $this->addReference(self::THEME_COEUR, $theme1);
        $this->addReference(self::THEME_GUEULE, $theme2);
        $this->addReference(self::THEME_PLANS, $theme3);

    }
}
