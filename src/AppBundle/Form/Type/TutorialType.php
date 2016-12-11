<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TutorialType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('french_title')
                ->add('english_title')
                ->add('french_html')
                ->add('english_html')
                ->add('tuto_next', EntityType::class , array(
                    'class' => 'AppBundle:TutorialType',
                    'choice_label' => 'name'
                ))
                ->add('tuto_prev', EntityType::class , array(
                    'class' => 'AppBundle:TutorialType',
                    'choice_label' => 'name'
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Tutorial'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tutorial';
    }


}
