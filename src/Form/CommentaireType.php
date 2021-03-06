<?php

namespace App\Form;

use App\Entity\Commentaire;
use App\Entity\User;
use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class)
            ->add('createdAt', DateType::class, [
              'widget'=>'single_text'
            ])
            ->add('user', EntityType::class, [
              'class'=> User::class,
              'choice_label'=>'pseudo'
            ])
            ->add('message', EntityType::class, [
              'class'=> Message::class,
              'choice_label'=>'title'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
            'label_format' => 'commentaire.%name%'
        ]);
    }
}
