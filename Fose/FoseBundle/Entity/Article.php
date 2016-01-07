<?php

namespace Fose\FoseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 *@ORM\Entity(repositoryClass="Fose\FoseBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks
 * Fose\FoseBundle\Entity\Article
 * @ORM\Table()

*/
class Article
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
 /**
     * @var string
     *
     * @ORM\Column(name="extrai", type="string", length=255)
     */
    private $extrai;

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
    * @ORM\OneToOne(targetEntity="Fose\FoseBundle\Entity\Image",cascade={"persist", "remove"})
    * @ORM\JoinTable(name="image_article")
    */
  private $image;
    /**
     * @ORM\OneToMany(targetEntity="Fose\FoseBundle\Entity\commentaire", mappedBy="article")
     */
  private $commentaires; // Ici commentaires prend un "s", car un article a plusieurs commentaires !
  /**
     * @ORM\ManyToOne(targetEntity="Fose\FoseBundle\Entity\articlecat")
     */
  private $cat_article;

 private $file;

  private $tempFilename;
   


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
 public function setExtrai($extrai)
    {
        $this->extrai = $extrai;

        return $this;
    }

    /**
     * Get extrai
     *
     * @return string
     */
    public function getExtrai()
    {
        return $this->extrai;
    }
    /**
     * Set datepub
     *
     * @param \DateTime $datepub
     *
     * @return Article
     */
    public function setDatepub(\Datetime $datepub)
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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Article
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set contenue
     *
     * @param string $contenue
     *
     * @return Article
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
     * Set image
     *
     * @param \Fose\FoseBundle\Entity\Image $image
     *
     * @return Article
     */
    public function setImage(\Fose\FoseBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Fose\FoseBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add commentaire
     *
     * @param \Fose\FoseBundle\Entity\commentaire $commentaire
     *
     * @return Article
     */
    public function addCommentaire(\Fose\FoseBundle\Entity\commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \Fose\FoseBundle\Entity\commentaire $commentaire
     */
    public function removeCommentaire(\Fose\FoseBundle\Entity\commentaire $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set catArticle
     *
     * @param \Fose\FoseBundle\Entity\article_cat $catArticle
     *
     * @return Article
     */
    public function setCatArticle(\Fose\FoseBundle\Entity\articlecat $catArticle = null)
    {
        $this->cat_article = $catArticle;

        return $this;
    }

    /**
     * Get catArticle
     *
     * @return \Fose\FoseBundle\Entity\article_cat
     */
    public function getCatArticle()
    {
        return $this->cat_article;
    } 
    /**
   * @ORM\PrePersist()
   * @ORM\PreUpdate()
   */
  //pour ce qui est de la génération des attributs $url et $alt ;
  public function preUpload()
  {
    // Si jamais il n'y a pas de fichier (champ facultatif)
    if (null === $this->file) {
      return;
    }

    // Le nom du fichier est son id, on doit juste stocker également son extension
    $this->contenue = $this->file->guessExtension();

    
  
  }

  /**
   * @ORM\PostPersist()
   * @ORM\PostUpdate()
   */
  //pour le déplacement effectif du fichier.
  public function upload()
  {
    // Si jamais il n'y a pas de fichier (champ facultatif)
    if (null === $this->file) {
      return;
    }

    // Si on avait un ancien fichier, on le supprime
    if (null !== $this->tempFilename) {
      $oldFile = $this->getUploadRootDir().'/'.$this->id.'_'.$this->titre.'.'.$this->tempFilename;
      if (file_exists($oldFile)) {
        unlink($oldFile);
      }
    }

    // On déplace le fichier envoyé dans le répertoire de notre choix
    $this->file->move(
      $this->getUploadRootDir(), // Le répertoire de destination
     $this->titre.'_'.$this->id.'.'.$this->contenue  // Le nom du fichier à créer, ici "id.extension"
    );
  }

  /**
   * @ORM\PreRemove()
   */
  //qui sauvegarde le nom du fichier qui dépend de l'id de l'entité.
  public function preRemoveUpload()
  {
    // On sauvegarde temporairement le nom du fichier car il dépend de l'id
    $this->tempFilename = $this->getUploadRootDir().'/'.$this->titre.'_'.$this->id.'.'.$this->contenue;
  }

  /**
   * @ORM\PostRemove()
   */
  //qui supprime effectivement le fichier grâce au nom enregistré
  public function removeUpload()
  {
    // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
    if (file_exists($this->tempFilename)) {
      // On supprime le fichier
      unlink($this->tempFilename);
    }
  }

  public function getUploadDir()
  {
    // On retourne le chemin relatif vers l'image pour un navigateur
    return 'uploads/article';
  }

  protected function getUploadRootDir()
  {
    // On retourne le chemin absolu vers l'article pour notre code PHP
    return __DIR__.'/../../../../web/'.$this->getUploadDir();
  }

  public function getWebPath()
  {
    return $this->getUploadDir().'/'.$this->getTitre().'_'.$this->getId().'.'.$this->getContenue();
  }
    public function setFile(UploadedFile $file)
  {
    $this->file = $file;

    // On vérifie si on avait déjà un fichier pour cette entité
    if (null !== $this->contenue) {
      // On sauvegarde l'extension du fichier pour le supprimer plus tard
      $this->tempFilename = $this->contenue;

      // On réinitialise les valeurs des attributs url et alt
      $this->contenue = null;
      
    }
  }

  public function getFile()
  {
    return $this->file;
  }
}
