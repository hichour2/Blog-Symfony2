<?php

namespace Fose\FoseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomVisiteur','text', array('label' => 'الإسم الكامل ', 'attr' => array('class' => 'form-poshytip')))
            ->add('email','text' ,array('label' => 'البريد الإلكتروني ', 'attr' => array('class' => 'form-poshytip')))
            ->add('contenueMsg','textarea', array('label' => 'محتوى الرسالة ', 'attr' => array('rows'=> 5, 'cols'=> 20,'class' => '')))

          
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fose\FoseBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fose_fosebundle_message';
    }
}
