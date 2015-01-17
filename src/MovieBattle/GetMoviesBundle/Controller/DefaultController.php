<?php

namespace MovieBattle\GetMoviesBundle\Controller;

use MovieBattle\GetMoviesBundle\Entity\Cast;
use MovieBattle\GetMoviesBundle\Entity\movie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function setAction()
    {
        $api = $this->container->getParameter('api_key');
        $url = 'http://api.rottentomatoes.com/api/public/v1.0/lists/movies/in_theaters.json?apikey=' . $api;
        $this->rt_api_call($url);
        return $this->render('MovieBattleGetMoviesBundle:Default:index.html.twig', array('name' => 'yes'));

    }

    public function indexAction($name)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery(
            'SELECT m, c FROM MovieBattleGetMoviesBundle:Cast c
            JOIN c.movie m where c.castMember like :name')->setParameter('name', '%' . $name . '%');
        $movies = $query->getResult();
        return $this->render('MovieBattleGetMoviesBundle:Default:index.html.twig', array('name' => $movies));
    }


    public function rt_api_call($url)
    {
        $api = $this->container->getParameter('api_key');
        $curl = $this->get('curl');

        $movie_db = $curl->get($url);
        $movies_info = json_decode($movie_db);

        if (isset($movies_info->error)) {
            echo $movies_info->error;
            return true;
        }
        foreach ($movies_info->movies as $movie) {
            $newMovie = new movie();
            $newMovie->setTitle($movie->title);
            $newMovie->setImageLarge($movie->posters->detailed);
            $newMovie->setImageSmall($movie->posters->thumbnail);
            $newMovie->setReleaseDate(new \DateTime($movie->release_dates->theater));
            $newMovie->setRtId($movie->id);
            $newMovie->setSynopsis($movie->synopsis);
            $em = $this->getDoctrine()->getManager();
            $em->persist($newMovie);
            $em->flush();
            foreach ($movie->abridged_cast as $actor) {
                $cast = new Cast();
                $cast->addMovie($newMovie);
                $cast->setCastMember($actor->name);
                $em = $this->getDoctrine()->getManager();
                $em->persist($cast);
                $em->flush();
            }
        }

        if (!empty($movies_info->links->next)) {
            sleep(1);
            $this->rt_api_call($movies_info->links->next . '&apikey=' . $api);


        }


    }
}
