<?php

namespace Epsi\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blog1")
     */
    public function index1Action()
    {
        $response = new Response();
        $response->setContent('Hello world!');
        $response->setStatusCode(Response::HTTP_OK);

        return $response;
    }
}
