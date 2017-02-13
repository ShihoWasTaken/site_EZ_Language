<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;



class CommentType extends AbstractType
{
  /**
   * {@inheritdoc}
   */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
          $builder->add('comment', TextareaType::class, array(
              'required' => true,
              'trim' => true,
          ));
    }


    /**
    * the name of the class that holds the underlying data
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Comment'
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
