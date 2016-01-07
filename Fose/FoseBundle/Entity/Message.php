<?php

namespace Fose\FoseBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 *@ORM\Entity(repositoryClass="Fose\FoseBundle\Entity\MessageRepository")
 * @ORM\HasLifecycleCallbacks
 * Fose\FoseBundle\Entity\Message
 * @ORM\Table()

*/
class Message
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
     * @var text
     *
     * @ORM\Column(name="contenueMsg", type="text")
     */
    private $contenueMsg;
     /**
     * @var text
     *
     * @ORM\Column(name="email", type="text")
     */
    private $email;

    /**
   * @ORM\Column(name="dateEnvoie", type="datetime")
   */
    private $dateEnvoie;

   
  public function __construct()
    {
    $this->dateEnvoie = new \Datetime();
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
     * @return Message
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
     * Set contenueMsg
     *
     * @param string $contenueMsg
     *
     * @return Message
     */
    public function setContenueMsg($contenueMsg)
    {
        $this->contenueMsg = $contenueMsg;

        return $this;
    }

    /**
     * Get contenueMsg
     *
     * @return string
     */
    public function getContenueMsg()
    {
        return $this->contenueMsg;
    }

    /**
     * Set dateEnvoie
     *
     * @param \DateTime $dateEnvoie
     *
     * @return Message
     */
    public function setDateEnvoie($dateEnvoie)
    {
        $this->dateEnvoie = $dateEnvoie;

        return $this;
    }

    /**
     * Get dateEnvoie
     *
     * @return \DateTime
     */
    public function getDateEnvoie()
    {
        return $this->dateEnvoie;
    }

    
public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    
    public function getEmail()
    {
        return $this->email;
    }
    
}

