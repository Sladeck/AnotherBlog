<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="articles")
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_oc", type="datetime")
     */
    private $dateOc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_om", type="datetime", nullable=true)
     */
    private $dateOm;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
     */
    private $category;

    /**
    * @ORM\OneToMany(targetEntity="Comments", mappedBy="articles", cascade={"persist", "remove"})
    */
    private $comments;

    public function __construct()
    {
        $this->title = new ArrayCollection();
        $this->setTitle('');
    }

     public function __toString()
     {
         return $this->getTitle();
     }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Articles
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Articles
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Articles
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set dateOc
     *
     * @param \DateTime $dateOc
     *
     * @return Articles
     */
    public function setDateOc($dateOc)
    {
        $this->dateOc = $dateOc;

        return $this;
    }


    /**
     * Get dateOc
     *
     * @return \DateTime
     */
    public function getDateOc()
    {
        return $this->dateOc;
    }

    /**
     * Set dateOm
     *
     * @param \DateTime $dateOm
     *
     * @return Articles
     */
    public function setDateOm($dateOm)
    {
        $this->dateOm = $dateOm;

        return $this;
    }

    /**
     * Get dateOm
     *
     * @return \DateTime
     */
    public function getDateOm()
    {
        return $this->dateOm;
    }
}
