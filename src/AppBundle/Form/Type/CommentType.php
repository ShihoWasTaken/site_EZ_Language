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
              'label' => 'User',
              'label_attr' => array(
                  'class' => 'col-sm-2 control-label',
                  'for'   =>  'inputEmail3'
               ),
              'attr' => array(
                  'class' => 'form-control',
                  'id'   =>  'inputEmail3'
               ),
              'required' => true
          ))
          ->add('comment', TextareaType::class, array(
              'label' => 'Comment',
              'attr' => array(
                  'class' => 'tinymce form-control',
                  'rows'  => '3'
               ),
              'label_attr' => array('class' => 'col-sm-5 control-label'),
              'required' => true,
              'trim' => true,
          ))
          ->add('postedAt', DateType::class, array(
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label' => 'Posted at',
                'label_attr' => array('class' => 'col-sm-5 control-label'),
                'attr' => array(
                    'class' => 'form-control input-inline datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy',
                    'data-date-autoclose' => 'true',
                    'data-date-clearBtn' => 'true',
                    'data-date-language' => 'fr'
            )
            ))
          ->add('save', SubmitType::class);
    }


/**
 * the name of the class that holds the underlying data
 */
public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
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
