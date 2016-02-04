.. _controleur-index2:

*********************
Paramètres dans l'URL
*********************

Les paramètres placés dans l'URL doivent être placés :

* dans la route entre accolades ;
* et dans la signature de la méthode.

Ajoutez une nouvelle action avec un paramètre :

.. code-block:: php

    class BlogController extends Controller
    {
        ...

        /**
         * @Route("/blog2/{name}")
         */
        public function index2Action($name)
        {
            $response = new Response();
            $response->setContent('Hello '.$name.'!');
            $response->setStatusCode(Response::HTTP_OK);

            return $response;
        }
    }

Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/blog2/John