<?php

namespace Fose\FoseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Fose\FoseBundle\Entity\Image;

class ImageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('file', 'file',array('label' => 'telecharger votre Image', 'attr' => array('class' => 'form-poshytip')))
            ->add('cat_image', 'entity', array(
            'class' => 'FoseFoseBundle:imagecat',
            'property' => 'nom_cat',
            'multiple' =>false,
            'expanded'=>false),array('label' => 'Catégorie d\'image de l\'article', 'attr' => array('class' => 'form-poshytip')))
;
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fose\FoseBundle\Entity\Image'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fose_fosebundle_image';
    }
}
