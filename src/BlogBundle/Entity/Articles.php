<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="name")
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", mappedBy="username")
     */
    private $author;


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

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Articles
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
}
