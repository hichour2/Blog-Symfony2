<?php

namespace Fose\FoseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MembredeclubType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('nom', 'text', array('label' => ':الإسم العائلي للعضو', 'attr' => array('class' => 'form-poshytip')))
           ->add('prenom', 'text', array('label' => ': الإسم الشخصي للعضو', 'attr' => array('class' => 'form-poshytip')))
           ->add('CIN', 'text', array('label' => ': رقم بطاقة التعريف الوطنية للعضو', 'attr' => array('class' => 'form-poshytip')))
           ->add('role', 'text', array('label' => ': المهام', 'attr' => array('class' => 'form-poshytip')))


          
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fose\FoseBundle\Entity\Membredeclub'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fose_fosebundle_membredeclub';
    }
}
