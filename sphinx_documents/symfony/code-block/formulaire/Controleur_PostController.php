<?php

// Epsi\Bundle\BlogBundle\Controller\PostController

namespace Epsi\Bundle\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Epsi\Bundle\BlogBundle\Entity\Post;
use Epsi\Bundle\BlogBundle\Form\PostType;

class PostController extends Controller {
    // ...

    /**
     * Displays a form to create a new Post entity.
     *
     */
    public function newAction() {
        $entity = new Post();
        $form = $this->createForm(new PostType(), $entity, array(
            'action' => $this->generateUrl('post_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $this->render('EpsiBlogBundle:Post:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    // ...
}
