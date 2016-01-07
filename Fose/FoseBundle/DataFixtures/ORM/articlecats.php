<?php

namespace Fose\FoseBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fose\FoseBundle\Entity\articlecat;

class articlecats implements FixtureInterface
{
// Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
public function load(ObjectManager $manager)
{
// Liste des noms de catégorie à ajouter
$noms = array('مخيم', 'النادي');
foreach($noms as $i => $nom)
{
// On crée la catégorie
$liste_categories[$i] = new articlecat();
$liste_categories[$i]->setNomCat($nom);
// On la persiste
$manager->persist($liste_categories[$i]);
}
// On déclenche l'enregistrement
$manager->flush();
}

}