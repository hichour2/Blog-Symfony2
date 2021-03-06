<?php

namespace Fose\FoseBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * lienRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class lienRepository extends \Doctrine\ORM\EntityRepository
{
    public function getreq()
{
$query = $this->createQueryBuilder('l')

->getQuery();
return $query->getResult();
}
    // On ajoute deux arguments : le nombre d'articles par page, ainsi que la page courante
    public function getLiens($nombreParPage, $page)
{
// On déplace la vérification du numéro de page dans cette méthode
if ($page < 1) {
throw new \InvalidArgumentException('L\'argument $page ne peut
être inférieur à 1 (valeur : "'.$page.'").');
}
// La construction de la requête reste inchangée
$query = $this->createQueryBuilder('l')

->getQuery();
// On définit l'article à partir duquel commencer la liste
$query->setFirstResult(($page-1) * $nombreParPage)
// Ainsi que le nombre d'articles à afficher
->setMaxResults($nombreParPage);
// Enfin, on retourne l'objet Paginator correspondant à la requête construite
// (n'oubliez pas le use correspondant en début de fichier)
return new Paginator($query);
}
}
