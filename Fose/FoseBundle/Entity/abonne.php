<?php

namespace Fose\FoseBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Fose\FoseBundle\Entity\abonne
 * @ORM\Table()
 * @ORM\Entity
*/
class abonne
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
/**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;
    /**
     * @var string
     *
     * @ORM\Column(name="num_integ", type="string", length=255)
     */
private $num_integ;
    /**
     * @var string
     *
     * @ORM\Column(name="CIN", type="string", length=255)
     */
private $CIN;
    /**
   * @ORM\Column(name="date_abonn", type="datetime")
   */
    private $date_abonn;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return abonne
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return abonne
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
     /**
     * Set nom
     *
     * @param string $nom
     *
     * @return abonne
     */
    public function setnum_integ($num_integ)
    {
        $this->num_integ = $num_integ;

        return $this;
    }

    /**
     * Get num_integ
     *
     * @return string
     */
    public function getnum_integ()
    {
        return $this->num_integ;
    }
    public function setCIN($cin)
    {
        $this->CIN = $cin;

        return $this;
    }

    /**
     * Get CIN
     *
     * @return string
     */
    public function getCIN()
    {
        return $this->num_integ;
    }
     /**
     * Set date_dabonn
     *
     * @param \DateTime $date_abonn
     *
     * @return Article
     */
    public function setdate_abonn($date_abonn)
    {
        $this->date_abonn = $date_abonn;

        return $this;
    }

    /**
     * Get date_abonn
     *
     * @return \DateTime
     */
    public function getdate_abonn()
    {
        return $this->date_abonn;
    }
}

