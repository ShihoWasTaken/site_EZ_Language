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
                    'class' => 'AppBundle:Tutorial',
                    'choice_label' => ($options["locale"] === "en" ? 'english_title' : 'french_title')
                ))
                ->add('tuto_prev', EntityType::class , array(
                    'class' => 'AppBundle:Tutorial',
                    'choice_label' => ($options["locale"] === "en" ? 'english_title' : 'french_title')
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Tutorial',
            'locale'     => 'en'
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
