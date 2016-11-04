<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use AppBundle\Form\Type\FunctionTypeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArgumentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('french_description')
                ->add('english_description')
                ->add('isReturn')
                ->add('type', EntityType::class , array(
                    'class' => 'AppBundle:FunctionType',
                    'choice_label' => 'name'
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Argument'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_argument';
    }


}
