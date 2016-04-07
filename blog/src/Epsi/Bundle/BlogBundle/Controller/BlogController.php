<?php

namespace Epsi\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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

    /**
     * @Route("/blog2/{name}")
     */
    public function index2Action($name)
    {
        $response = new Response();
        $response->setContent('Hello ' . $name . '!');
        $response->setStatusCode(Response::HTTP_OK);

        return $response;
    }

    /**
     * @Route("/blog3/{name}")
     */
    public function index3Action($name)
    {
        $response = new Response();
        $response->setContent(
            $this->get('templating')->render(
                'EpsiBlogBundle:Blog:index3.html.twig',
                array(
                    'name' => $name,
                )
            )
        );
        $response->setStatusCode(Response::HTTP_OK);

        return $response;
    }

    /**
     * @Route("/blog4/{name}")
     */
    public function index4Action($name)
    {
        return $this->render(
            'EpsiBlogBundle:Blog:index3.html.twig',
            array(
                'name' => $name,
            )
        );
    }

    /**
     * @Route("/blog5/{name}", requirements={"name" = "(\w+[\s]?)+"})
     * @Template()
     */
    public function index5Action($name)
    {
        return array(
            'name' => $name,
        );
    }
}
