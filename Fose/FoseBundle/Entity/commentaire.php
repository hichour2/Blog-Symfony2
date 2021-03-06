<?php

namespace Fose\FoseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 *Fose\FoseBundle\Entity\commentaire
 * @ORM\Table()
 * @ORM\Entity 
 */
class commentaire
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
     * @ORM\Column(name="nomVisiteur", type="string", length=255)
     */
    private $nomVisiteur;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
   * @ORM\Column(name="datepub", type="datetime")
   */
    private $datepub;

    /**
     * @var text
     *
     * @ORM\Column(name="contenue", type="text")
     */
    private $contenue;
    
     /**
     * @ORM\ManyToOne(targetEntity="Fose\FoseBundle\Entity\Article", inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;
    
    public function __construct()
    {
    $this->datepub = new \Datetime();
    }

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
     * Set nomVisiteur
     *
     * @param string $nomVisiteur
     *
     * @return commentaire
     */
    public function setNomVisiteur($nomVisiteur)
    {
        $this->nomVisiteur = $nomVisiteur;

        return $this;
    }

    /**
     * Get nomVisiteur
     *
     * @return string
     */
    public function getNomVisiteur()
    {
        return $this->nomVisiteur;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return commentaire
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set datepub
     *
     * @param \DateTime $datepub
     *
     * @return commentaire
     */
    public function setDatepub($datepub)
    {
        $this->datepub = $datepub;

        return $this;
    }

    /**
     * Get datepub
     *
     * @return \DateTime
     */
    public function getDatepub()
    {
        return $this->datepub;
    }

    /**
     * Set contenue
     *
     * @param string $contenue
     *
     * @return commentaire
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;

        return $this;
    }

    /**
     * Get contenue
     *
     * @return string
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * Set article
     *
     * @param \Fose\FoseBundle\Entity\Article $article
     *
     * @return commentaire
     */
    public function setArticle(\Fose\FoseBundle\Entity\Article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Fose\FoseBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
