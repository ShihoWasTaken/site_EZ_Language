<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use AppBundle\Form\Type\ArgumentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EZFunctionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('french_description')
                ->add('english_description')
                ->add('french_html')
                ->add('english_html')
                ->add('arguments', "collection", array(
                    'type' => ArgumentType::class,
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ))                
                ->add('category', EntityType::class, array(
                    'class' => 'AppBundle:Category',
                    'choice_label' => ($options["locale"] === "en" ? 'english_label' : 'french_label')
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EZFunction',
            'locale'     => 'en'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ezfunction';
    }


}
