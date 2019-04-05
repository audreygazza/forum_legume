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
                -> setDescription("Partagez vos coups de coeurs cuisine, légumes ou producteurs.")
                -> setSlug('coup_d_coeur_conso');


        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2 -> setName("Coup d'gueule conso")
                -> setDescription("Vous avez repéré des arnaques ou des produits de mauvaise qualités, faites-en part !!")
                -> setSlug('coup_d_gueule_conso');


        $manager->persist($theme2);

        $theme3 = new Theme();
        $theme3 -> setName("Bons plans")
                -> setDescription("Partagez ici les bons plans que vous avez repéré.")
                -> setSlug('bons_plans');


        $manager->persist($theme3);

        $theme4 = new Theme();
        $theme4 -> setName("Avis sur produits/Marques")
                -> setDescription("Aidez-nous à consommer responsable. N'hésitez pas à partager circuits courts et trouvailles.")
                -> setSlug('avis_sur_produits');


        $manager->persist($theme4);

        $theme5 = new Theme();
        $theme5 -> setName("Conseils & Astuces")
                -> setDescription("Partagez ici les conseils cuisine, achat ou consommation.")
                -> setSlug('conseil');
                

        $manager->persist($theme5);



        $manager->flush();

        $this->addReference(self::THEME_COEUR, $theme1);
        $this->addReference(self::THEME_GUEULE, $theme2);
        $this->addReference(self::THEME_PLANS, $theme3);

    }
}
