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
    const MESSAGE_ALIMENTSSAINS = 'msg5';
    const MESSAGE_LEMARCHE = 'msg6';
    const MESSAGE_BARQUETTE = 'msg7';
    const MESSAGE_RADIATION = 'msg8';
    const MESSAGE_GREENBASHING = 'msg9';
    const MESSAGE_ZERODECHET = 'msg10';
    const MESSAGE_MARQUESETHIC = 'msg11';
    const MESSAGE_TAWASHI = 'msg12';








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

     $message5 = new Message();
     $message5 -> setTitle(" Aliments sains")
      -> setContent("Bonjour la communauté, je viens vers vous car je suis en plein réequilibrage alimentaire. Voila j'aimerais redécouvrir les plaisirs de la food. Auriez-vous des recettes simples et saines pour cet été ")
    ->setUser($this->getReference(UserFixtures::USER_SALOME))
    ->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_ALIMENTSSAINS));
    $manager->persist($message5);

    $message6 = new Message();
    $message6 -> setTitle("Les Marchés")
    -> setContent("Salut! Je vais bcp sur les marchés et voila je remarque juste que ca vaut vraimment le coup par rapport aux supermarchés. C'est pas pour lancer des fleurs ou quoi mais les fruits et légumes du marché ont plus de saveurs, les prix sont les mêmes et parfois moindre. En plus on créer de vertiables liens avec les vendeurs. Et puis c'est un bon moment quoi ! Voila venez sur les marché c'est vraiment sympat, vous rencontrez les producteurs et les fruits et legumes on sait d'ou ils viennent.")
   ->setUser($this->getReference(UserFixtures::USER_RICO))
   ->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_LEMARCHE));
   $manager->persist($message6);

   $message7 = new Message();
   $message7 -> setTitle(" Des clémentines en barquettes ! ")
 -> setContent("Coucou les gens ! Je viens à la revolte ! On est tous au courant de la machine infame que sont les supermarchés mais la ca va trop loin. Ils nous servent des clementines epluchés en barquette. Typiquement le genre produit qui aura fait trois fois le tour du monde, recolté au maroc, epluché en chine et mise en barquette au perou, pour etre certifié equitable et vendu en france. Quelle est la prochaine étape ?! ")
  ->setUser($this->getReference(UserFixtures::USER_SALOME))
  ->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_BARQUETTE));
  $manager->persist($message7);

  $message8 = new Message();
  $message8 -> setTitle(" Des radiations dans nos assiettes")
  -> setContent("Salut à tous, je surveille le milieu de  l'agroalimentaire depruis dix ans, et je viens vous parler des radiations que subissent les fruits et legumes des grands supermarché. J'ai nomé le syndrome de blanche neige. On en parle peu voire pas mais on nous nourrit littéralement de pommes empoisonnés. Le but est de conserver un aspect frais des denrés périssables plus longtemps. Ce procédé enlève tout nutriments et valeur ajouté aux fruits. Ce que vous avez dans vos assiette eh bien ce sont des aliments vide. C'est outragant!")
 ->setUser($this->getReference(UserFixtures::USER_PABLO))
 ->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_RADIATION));
 $manager->persist($message8);

 $message9 = new Message();
 $message9 -> setTitle(" Greenbashing")
  -> setContent("Hey ! un petit message d'alerte pour lutter contre le greenbashing, une arme marketing pour les entreprises et sutout une arme pour pousser à la consommation ! En somme toute, une arme de destruction des ressources et de la terre. ")
->setUser($this->getReference(UserFixtures::USER_REGLASS))
->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_GREENBASHING));
$manager->persist($message9);

$message10 = new Message();
$message10 -> setTitle(" Les Boutiques Zero Dechet")
 -> setContent(" Coucou la population ! Un petit message pour mettre en avant ma dernière découverte à Strasbourg, une boutique zero dechet en plein coeur de la Krutenau. C'est le BOCAL, la gérante est adorable et le concept est génial. Le but réduire la quantité de déchet inutile et aquierir des produits ethiques et de qualités ! Bref je suis satisfaite, je peux consommer de manière responssable très facilement.")
->setUser($this->getReference(UserFixtures::USER_REGLASS))
->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_ZERODECHET));
$manager->persist($message10);

$message11 = new Message();
$message11 -> setTitle(" Des marques de nourriture ethic")
 -> setContent(" Hey :) Je suis en train de changer ma facon de consommer, j'aimerai consommer en respect des prodcteurs et de la terre. Connaissez vous des marques de food ethic et facile à trouver ? Voila après mon budjet n'est pas non plus très élevé...  ")
->setUser($this->getReference(UserFixtures::USER_PABLO))
->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_MARQUESETHIC));
$manager->persist($message11);

$message12 = new Message();
$message12 -> setTitle(" Des éponges maison : les TAWASHI !")
 -> setContent(" Coucou voici ma dernière découverte : les tawashi ! C'est génial ! Le tawashi est une éponge zéro déchet qu'on fabrique avec du tissu de récup. On s'en sert pour faire la vaisselle, laver la table ... C'est facile à faire et ca passe à la machine à laver ! Vous avez juste besoin de vieux vetements ou de tissu de reccup. Voila le lien du tuto : 'https://www.youtube.com/watch?v=JkhjI7srH_8' ")
->setUser($this->getReference(UserFixtures::USER_SALOME))
->setdiscussion($this->getReference(DiscussionFixtures::DISCUSSION_TAWASHI));
$manager->persist($message12);

        $manager->flush();

        $this->addReference(self::MESSAGE_AMAP, $message1);
        $this->addReference(self::MESSAGE_ALERTE, $message2);
        $this->addReference(self::MESSAGE_DRIVE, $message3);
        $this->addReference(self::MESSAGE_SUPERALIMENTS, $message4);
        $this->addReference(self::MESSAGE_ALIMENTSSAINS, $message5);
        $this->addReference(self::MESSAGE_LEMARCHE, $message6);
        $this->addReference(self::MESSAGE_BARQUETTE, $message7);
        $this->addReference(self::MESSAGE_RADIATION, $message8);
        $this->addReference(self::MESSAGE_GREENBASHING, $message9);
        $this->addReference(self::MESSAGE_ZERODECHET, $message10);
        $this->addReference(self::MESSAGE_MARQUESETHIC, $message11);






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
