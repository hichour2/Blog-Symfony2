<?php

namespace Fose\FoseBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 *@ORM\Entity(repositoryClass="Fose\FoseBundle\Entity\lienRepository")
 * @ORM\HasLifecycleCallbacks
 * Fose\FoseBundle\Entity\lien
 * @ORM\Table()

*/
class lien
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
     * @ORM\Column(name="nomLien", type="string", length=255)
     */
    private $nomLien;

   /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


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
     * Set nomLien
     *
     * @param string $nomLien
     *
     * @return lien
     */
    public function setNomLien($nomLien)
    {
        $this->nomLien = $nomLien;

        return $this;
    }

    /**
     * Get nomLien
     *
     * @return string
     */
    public function getNomLien()
    {
        return $this->nomLien;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return lien
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

