<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;



class CommentType extends AbstractType
{
  /**
   * {@inheritdoc}
   */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
          $builder
          ->add('user', EntityType::class, array(
              // query choices from this entity
              'class' => 'AppBundle:User',

              // use the User.username property as the visible option string
              'choice_label' => 'username'

              // used to render a select box, check boxes or radios
              // 'multiple' => true,
              // 'expanded' => true,
          ))
          ->add('comment', TextareaType::class, array(
              'attr' => array('class' => 'tinymce'),
              'required' => 'true',
              'trim' => 'true'
          ))
          ->add('postedAt', DateType::class, array(
              // render as a single text box
              'widget' => 'single_text',
              'placeholder' => 'Select a value',
              // this is actually the default format for single_text
              'format' => 'dd-MM-yyyy',
              'model_timezone' => 'Europe/Paris'
          ))
          ->add('save', SubmitType::class);
    }


/**
 * the name of the class that holds the underlying data
 */
public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        #'data_class' => Comment::class,
        'data_class' => 'AppBundle\Entity\Comment',
        'locale' => 'en'
    ));
}

/**
 * {@inheritdoc}
 */
public function getBlockPrefix()
{
    return 'appbundle_comment';
}
}

?>
