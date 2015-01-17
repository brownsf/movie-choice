<?php

namespace MovieBattle\GetMoviesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cast
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cast
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
     * @ORM\ManyToOne(targetEntity="movie")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id")
     */
    private $movie;

    /**
     * @var string
     *
     * @ORM\Column(name="cast_member", type="string", length=255)
     */
    private $castMember;


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
     * Set movieId
     *
     * @param integer $movieId
     * @return Cast
     */
    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;

        return $this;
    }

    /**
     * Get movieId
     *
     * @return integer 
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    /**
     * Set castMember
     *
     * @param string $castMember
     * @return Cast
     */
    public function setCastMember($castMember)
    {
        $this->castMember = $castMember;

        return $this;
    }

    /**
     * Get castMember
     *
     * @return string 
     */
    public function getCastMember()
    {
        return $this->castMember;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movieId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add movieId
     *
     * @param \MovieBattle\GetMoviesBundle\Entity\movie $movieId
     * @return Cast
     */
    public function addMovieId(\MovieBattle\GetMoviesBundle\Entity\movie $movieId)
    {
        $this->movieId[] = $movieId;

        return $this;
    }

    /**
     * Remove movieId
     *
     * @param \MovieBattle\GetMoviesBundle\Entity\movie $movieId
     */
    public function removeMovieId(\MovieBattle\GetMoviesBundle\Entity\movie $movieId)
    {
        $this->movieId->removeElement($movieId);
    }

    /**
     * Add movie
     *
     * @param \MovieBattle\GetMoviesBundle\Entity\movie $movie
     * @return Cast
     */
    public function addMovie(\MovieBattle\GetMoviesBundle\Entity\movie $movie)
    {
        $this->movie[] = $movie;

        return $this;
    }

    /**
     * Remove movie
     *
     * @param \MovieBattle\GetMoviesBundle\Entity\movie $movie
     */
    public function removeMovie(\MovieBattle\GetMoviesBundle\Entity\movie $movie)
    {
        $this->movie->removeElement($movie);
    }

    /**
     * Get movie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set movie
     *
     * @param \MovieBattle\GetMoviesBundle\Entity\movie $movie
     * @return Cast
     */
    public function setMovie(\MovieBattle\GetMoviesBundle\Entity\movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }
}
