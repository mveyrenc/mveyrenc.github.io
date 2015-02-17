<?php

namespace Epsi\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller {

    public function showAction($id) {
        // On fera des truc ici, plus tard
        return new Response("Affichage du post avec l'id : " . $id . ".");
    }

}
