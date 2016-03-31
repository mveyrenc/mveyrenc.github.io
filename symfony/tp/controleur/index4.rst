.. _controleur-index4:

********************************************
Utilisation des templates avec moins de code
********************************************

Comme toutes les actions revoient des objets ``Response`` et que dans 95% des cas, avec le code 200, il existe un raccourcis dans la classe ``Controller``.

Ajoutez une nouvelle action dans le contrôleur :

.. code-block:: php
    :linenos:
    :emphasize-lines: 9-20

    class BlogController extends Controller
    {
        ...

        public function index3Action()
            ...
        {

        /**
         * @Route("/blog/{name}")
         */
        public function index4Action($name)
        {
            return $this->render(
                'EpsiBlogBundle:Blog:index4.html.twig',
                array(
                    'name' => $name,
                )
            );
        }
    }

Pour le template ``EpsiBlogBundle:Blog:index4.html.twig``, on copie le template ``EpsiBlogBundle:Blog:index3.html.twig``.

Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/blog4/John