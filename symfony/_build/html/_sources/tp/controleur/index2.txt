.. _controleur-index2:

*********************
Paramètres dans l'URL
*********************

Ajoutez la méthode ``index2Action`` surlignée en dessous de la méthode ``index1Action``.

.. code-block:: php
    :linenos:
    :emphasize-lines: 10-20

    class BlogController extends Controller
    {
        ...

        public function index1Action()
        {
            ...
        }

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

Appelez l'action ``index2`` avec le paramètre 'John' an allant sur la page http://symfony.loc.epsi.fr/app_dev.php/blog2/John. La page doit afficher le message 'Hello John!'.

Les paramètres placés dans l'URL doivent être placés :

* dans la route entre accolades (l10) ;
* et dans la signature de la méthode (l12).

Enfin, il ne reste plus qu'à utiliser la variable contenant notre paramètre. Ici, nous l'insérons dans le message affiché sur la page (l15).