<?php

namespace Fose\FoseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * image_cat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fose\FoseBundle\Entity\imagecatRepository")
 */
class imagecat
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
     * @return image_cat
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

