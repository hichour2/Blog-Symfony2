<?php

namespace Fose\FoseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * article_cat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fose\FoseBundle\Entity\articlecatRepository")
 */
class articlecat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cat", type="string", length=255)
     */
    private $nomCat;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomCat
     *
     * @param string $nomCat
     *
     * @return article_catergorie
     */
    public function setNomCat($nomCat)
    {
        $this->nomCat = $nomCat;

        return $this;
    }

    /**
     * Get nomCat
     *
     * @return string
     */
    public function getNomCat()
    {
        return $this->nomCat;
    }
}

