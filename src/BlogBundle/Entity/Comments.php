<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\CommentsRepository")
 */
class Comments
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comments
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateOc
     *
     * @param \DateTime $dateOc
     *
     * @return Comments
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
     * @return Comments
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
