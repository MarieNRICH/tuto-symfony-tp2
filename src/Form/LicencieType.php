<?php

namespace App\Form;

use App\Entity\Licencie;
use App\Entity\Club;
use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LicencieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('licenseName', TextType::class, [
                'label' => 'This is your License Name label'
            ])
            ->add('licenseFirstname', TextType::class, [
                'label' => 'This is your License Firstname label'
            ])
            ->add('licensePicture', TextType::class, [
                'label' => 'This is your License Picture label'
            ])
            ->add('birthDate', BirthdayType::class, [
                'label' => 'Date'
            ])
            ->add('club', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'clubName'
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'teamName',
            ])
            ->add('licensePicture', FileType::class, [
                'label' => 'Photo de l’article',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5000k',
                        'mimeTypes' => [
                        'image/*',
                        ],
                    'mimeTypesMessage' => 'Image trop lourde',
                    ])
                ],
            ]);               
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Licencie::class,
        ]);
    }
}
