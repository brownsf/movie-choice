<?php

namespace MovieBattle\GetMoviesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * movie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class movie
{
    /**
     * @var integer
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
     * @var \DateTime
     *
     * @ORM\Column(name="release_date", type="date")
     */
    private $release_date;

    /**
     * @var string
     *
     * @ORM\Column(name="image_small", type="string", length=255)
     */
    private $imageSmall;

    /**
     * @var string
     *
     * @ORM\Column(name="image_large", type="string", length=255)
     */
    private $imageLarge;

    /**
     * @var integer
     *
     * @ORM\Column(name="rt_id", type="integer",unique=true)
     */
    private $rtId;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="blob")
     */
    private $synopsis;


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
     * Set title
     *
     * @param string $title
     * @return movie
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
     * Set release-date
     *
     * @param \DateTime $releaseDate
     * @return movie
     */
    public function setReleaseDate($releaseDate)
    {
        $this->release_date = $releaseDate;

        return $this;
    }

    /**
     * Get release-date
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * Set imageSmall
     *
     * @param string $imageSmall
     * @return movie
     */
    public function setImageSmall($imageSmall)
    {
        $this->imageSmall = $imageSmall;

        return $this;
    }

    /**
     * Get imageSmall
     *
     * @return string 
     */
    public function getImageSmall()
    {
        return $this->imageSmall;
    }

    /**
     * Set imageLarge
     *
     * @param string $imageLarge
     * @return movie
     */
    public function setImageLarge($imageLarge)
    {
        $this->imageLarge = $imageLarge;

        return $this;
    }

    /**
     * Get imageLarge
     *
     * @return string 
     */
    public function getImageLarge()
    {
        return $this->imageLarge;
    }

    /**
     * Set rtId
     *
     * @param integer $rtId
     * @return movie
     */
    public function setRtId($rtId)
    {
        $this->rtId = $rtId;

        return $this;
    }

    /**
     * Get rtId
     *
     * @return integer 
     */
    public function getRtId()
    {
        return $this->rtId;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return movie
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set cast
     *
     * @param string $cast
     * @return movie
     */
    public function setCast($cast)
    {
        $this->cast = $cast;

        return $this;
    }

    /**
     * Get cast
     *
     * @return string 
     */
    public function getCast()
    {
        return $this->cast;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cast = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cast
     *
     * @param \MovieBattle\GetMoviesBundle\Entity\Cast $cast
     * @return movie
     */
    public function addCast(\MovieBattle\GetMoviesBundle\Entity\Cast $cast)
    {
        $this->cast[] = $cast;

        return $this;
    }

    /**
     * Remove cast
     *
     * @param \MovieBattle\GetMoviesBundle\Entity\Cast $cast
     */
    public function removeCast(\MovieBattle\GetMoviesBundle\Entity\Cast $cast)
    {
        $this->cast->removeElement($cast);
    }
}
