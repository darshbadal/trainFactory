<?php


namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return $this->render('home/home.html.twig');
    }

    /**
     * @Route("/show")
     */
    public function show()
    {
        return new Response('sdasda');
    }
}