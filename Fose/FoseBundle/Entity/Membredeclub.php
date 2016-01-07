<?php

namespace Fose\FoseBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity(repositoryClass="Fose\FoseBundle\Entity\MembredeclubRepository")
 * @ORM\HasLifecycleCallbacks
 * Fose\FoseBundle\Entity\Membredeclub
 * @ORM\Table()

*/
class Membredeclub
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
     * @ORM\Column(name="CIN", type="string", length=255)
     */
    private $CIN;
/**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;


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
     * @return Membre_de_club
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
     * @return Membre_de_club
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
     * Set cIN
     *
     * @param string $cIN
     *
     * @return Membre_de_club
     */
    public function setCIN($CIN)
    {
        $this->CIN = $CIN;

        return $this;
    }

    /**
     * Get cIN
     *
     * @return string
     */
    public function getCIN()
    {
        return $this->CIN;
    }
     public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get cIN
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
}


