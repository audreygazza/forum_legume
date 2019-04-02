<?php

namespace App\Form;

use App\Entity\Discussion;
use App\Entity\Theme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscussionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('lastMsg', DateType::class, [
              'widget'=>'single_text'
            ])
            ->add('theme', EntityType::class, [
              'class'=>Theme::class,
              'choice_label'=>'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Discussion::class,
            'label_format' => 'discussion.%name%'
        ]);
    }
}
