.. _controleur-index4:

********************************************
Utilisation des templates avec moins de code
********************************************

Comme une action revoit toujours un objet ``Response`` et que dans 95% des cas, il s'agit d'un code de retour 200, la classe ``Controller`` implémente la méthode ``render`` qui permet de faire exactement la même chose que dans ``index3Action`` mais en une seule ligne.

Ajoutez une nouvelle action dans le contrôleur :

.. code-block:: php
    :linenos:
    :emphasize-lines: 23-34

    class BlogController extends Controller
    {
        ...

        /**
         * @Route("/blog3/{name}")
         */
        public function index3Action()
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
        {

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
    }

Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/blog4/John