<?php

namespace Fose\FoseBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Fose\FoseBundle\Entity\Enligne
 * @ORM\Table()
 * @ORM\Entity
*/
class Enligne
{
    /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="iP", type="string", length=255)
     */
    private $iP;

     /**
   * @ORM\Column(name="dateConnecte", type="datetime")
   */
    private $dateConnecte;


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
     * Set iP
     *
     * @param string $iP
     *
     * @return Enligne
     */
    public function setIP($iP)
    {
        $this->iP = $iP;

        return $this;
    }

    /**
     * Get iP
     *
     * @return string
     */
    public function getIP()
    {
        return $this->iP;
    }

    /**
     * Set dateConnecte
     *
     * @param \DateTime $dateConnecte
     *
     * @return Enligne
     */
    public function setDateConnecte($dateConnecte)
    {
        $this->dateConnecte = $dateConnecte;

        return $this;
    }

    /**
     * Get dateConnecte
     *
     * @return \DateTime
     */
    public function getDateConnecte()
    {
        return $this->dateConnecte;
    }
}

