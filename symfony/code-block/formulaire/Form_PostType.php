<?php
// Epsi\Bundle\BlogBundle\Form\PostType

namespace Epsi\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('date')
                ->add('body')
                ->add('author')
                ->add('tags')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Epsi\Bundle\BlogBundle\Entity\Post'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'epsi_bundle_blogbundle_post';
    }

}
