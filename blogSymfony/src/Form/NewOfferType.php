<?php

namespace App\Form;

use App\Entity\Contract;
use App\Entity\ContractType;
use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class)
            ->add('Description', TextType::class)
            ->add('Ville', TextType::class)
            ->add('Adresse', TextType::class)
            ->add('End', DateType::class)
            ->add('Postal', TextType::class)
            ->add('Contract', EntityType::class, [
                'class' => Contract::class
                ])
            ->add('ContractType', EntityType::class, [
                'class' => ContractType::class,
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add("Validation", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-light"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
