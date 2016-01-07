<?php

namespace Fose\FoseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Fose\FoseBundle\Form\ImageType;
use Fose\FoseBundle\Entity\imagecat;
use KMS\FroalaEditorBundle\DependencyInjection\Configuration;
use KMS\FroalaEditorBundle\Service\OptionManager;
use KMS\FroalaEditorBundle\Service\PluginProvider;
use KMS\FroalaEditorBundle\Utility\UConfiguration;


class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => 'Titre de l\'article', 'attr' => array('class' => 'form-poshytip')))
            ->add('extrai', 'textarea', array('label' => '20 oremier mots de l\'article', 'attr' => array('class' => 'form-poshytip')))

                
            ->add('datepub','datetime',array('label' => 'Date de Creation de l\'article', 'attr' => array('class' => 'form-poshytip')))
           //->add('file','file')
            ->add('image',  new imageType(), array('required' => false) )
                ->add('cat_article', 'entity', array(
            'class' => 'FoseFoseBundle:articlecat',
           'property' => 'nom_cat',
           'multiple' =>false,),array('label' => 'Catégorie de l\'article', 'attr' => array('class' => 'form-poshytip')))
            ->add( "contenue", "froala", array(
                    "language" => "fr",
                    "toolbarInline" => false,
                    "tableColors" => [ "#FFFFFF", "#FF0000" ],
                    "saveParams" => [ "id" => "myEditorField" ]
) )
            ;
           //  ->add('contenue', 'textarea', array('required'=>false));

 
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fose\FoseBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fose_fosebundle_article';
    }
}
