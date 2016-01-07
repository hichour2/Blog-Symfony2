<?php

namespace Fose\FoseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class lienType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLien', 'text', array('label' => 'العنوان', 'attr' => array('class' => 'form-poshytip')))
           ->add('url', 'text', array('label' => 'عنوان الموقع', 'attr' => array('class' => 'form-poshytip')))
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fose\FoseBundle\Entity\lien'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fose_fosebundle_lien';
    }
}
