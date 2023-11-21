<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Team;
use App\Entity\Licencie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('clubName', TextType::class, [
                'label' => 'This is your Title label'
            ])
            ->add('sportClub', TextType::class, [
                'label' => 'This is your Title label'
            ])
            ->add('clubAddress', TextType::class, [
                'label' => 'This is your Title label'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
