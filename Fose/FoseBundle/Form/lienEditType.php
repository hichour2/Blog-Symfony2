<?php
namespace Fose\FoseBundle\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class lienEditType extends lienType // Ici, on hérite de ArticleType
{
public function buildForm(FormBuilderInterface $builder, array
$options)
{
// On fait appel à la méthode buildForm du parent, qui va ajouter tous les champs à $builder
parent::buildForm($builder, $options);
// On supprime celui qu'on ne veut pas dans le formulaire de modification

}
// On modifie cette méthode car les deux formulaires doivent avoir un nom différent
public function getName()
{
return 'Fose_Fosebundle_lienedittype';
}
}